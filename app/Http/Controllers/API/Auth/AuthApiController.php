<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\{ForgotPasswordRequest, RegisterRequest, ResendOtpRequest, ResetPasswordRequest, VerifyEmailRequest, VerifyOtpRequest};
use App\Http\Resources\Auth\{LoginResource, RegisterResource};
use App\Models\User;
use App\Traits\{SendOtp, ApiResponse};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash, Log};
use Illuminate\Support\Str;
use Exception;

class AuthApiController extends Controller
{
    use ApiResponse, SendOtp;

    public function registerApi(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone_number' => $request->phone_number,
                'terms_and_conditions' => $request->terms_and_conditions,
                'user_type' => $request->user_type,
            ]);
            $otp = $this->SendOtp($user, 'Verify Your Email Address');
            $message = __('Register Successfully. Please check your email to verify. OTP: ') . $otp;
            return $this->sendResponse(new RegisterResource($user), $message);
        } catch (Exception $e) {
            Log::error('Register Error: ' . $e->getMessage(), ['context' => $request->all()]);
            return $this->sendError('Registration failed', ['error' => $e->getMessage()], 500);
        }
    }

    public function loginApi(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return $this->sendError('Invalid Credentials', [], 401);
            }

            if (!$user->email_verified_at) {
                return $this->sendError('Email Not Verified', [], 403);
            }
            $token = $user->createToken('YourAppName')->plainTextToken;
            return $this->sendResponse(new LoginResource($user), 'Login successful', $token);
        } catch (Exception $e) {
            Log::error('Login Error: ' . $e->getMessage());
            return $this->sendError('Login failed', ['error' => $e->getMessage()], 500);
        }
    }

    public function verifyEmailApi(VerifyEmailRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $user = User::where('email', $request->email)->firstOrFail();
            Log::info('Verify Email Attempt', ['email' => $request->email, 'otp' => $request->otp]);
            // Check if email is already verified
            if ($user->email_verified_at || $user->is_verified) {
                Log::info('Email already verified', ['user_id' => $user->id, 'email' => $user->email]);
                return $this->sendError('Email is already verified', [], 422);
            }
            $otp = $user->otps()
                ->where('otp', $request->otp)
                ->where('is_verified', false)
                ->where('expires_at', '>', now())
                ->latest()
                ->first();

            if (!$otp) {
                return $this->sendError('Invalid or expired OTP', [], 422);
            }
            $otp->update(['is_verified' => true, 'verified_at' => now()]);
            $user->update([
                'email_verified_at' => now(),
                'is_verified' => true,
                'verified_at' => now (),
            ]);

            $token = $user->createToken('YourAppName')->plainTextToken;
            return $this->sendResponse(new LoginResource($user), 'Email verified successfully', $token);
        } catch (Exception $e) {
            Log::error('Email Verification Error: ' . $e->getMessage());
            return $this->sendError('Verification failed', ['error' => $e->getMessage()], 500);
        }
    }

    public function resendOtpApi(ResendOtpRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $user = User::where('email', $request->email)->firstOrFail();
            $otp = $this->SendOtp($user, 'Resend OTP for Email Verification');
            return $this->sendResponse(new RegisterResource($user), 'OTP resent successfully. OTP: ' . $otp);
        } catch (Exception $e) {
            Log::error('Resend OTP Error: ' . $e->getMessage());
            return $this->sendError('OTP resend failed', ['error' => $e->getMessage()], 500);
        }
    }

    public function forgotPasswordApi(ForgotPasswordRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $user = User::where('email', $request->email)->firstOrFail();
            $otp = $this->SendOtp($user, 'Reset Your Password');
            return $this->sendResponse(new RegisterResource($user), 'OTP sent for password reset. OTP: ' . $otp);
        } catch (Exception $e) {
            Log::error('Forgot Password Error: ' . $e->getMessage());
            return $this->sendError('Failed to send OTP', ['error' => $e->getMessage()], 500);
        }
    }

    public function verifyOtpApi(VerifyOtpRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $user = User::where('email', $request->email)->firstOrFail();
            $otp = $user->otps()
                ->where('otp', $request->otp)
                ->where('is_verified', false)
                ->where('expires_at', '>', now())
                ->latest()
                ->first();

            if (!$otp) {
                return $this->sendError('Invalid or expired OTP', [], 422);
            }

            $otp->update(['is_verified' => true, 'verified_at' => now()]);
            $token = Str::random(40);
            $user->update([
                'reset_password_token' => $token,
                'reset_password_token_expire_at' => now()->addHour(),
            ]);

            return $this->sendResponse(new RegisterResource($user), 'OTP verified. Token generated for password reset.', $token);
        } catch (Exception $e) {
            Log::error('OTP Verification Error: ' . $e->getMessage());
            return $this->sendError('Failed to verify OTP', ['error' => $e->getMessage()], 500);
        }
    }

    public function resetPasswordApi(ResetPasswordRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $user = User::where('email', $request->email)->firstOrFail();

            if (
                $user->reset_password_token !== $request->token ||
                Carbon::now()->gt($user->reset_password_token_expire_at)
            ) {
                return $this->sendError('Invalid or expired token', [], 401);
            }

            $user->update([
                'password' => Hash::make($request->password),
                'reset_password_token' => null,
                'reset_password_token_expire_at' => null,
            ]);

            return $this->sendResponse([], 'Password reset successfully.');
        } catch (Exception $e) {
            Log::error('Reset Password Error: ' . $e->getMessage());
            return $this->sendError('Failed to reset password', ['error' => $e->getMessage()], 500);
        }
    }

    public function logoutApi(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return $this->sendResponse([], 'Logout successful.');
        } catch (Exception $e) {
            Log::error('Logout Error: ' . $e->getMessage());
            return $this->sendError('Logout failed', ['error' => 'Please try again'], 500);
        }
    }
}
