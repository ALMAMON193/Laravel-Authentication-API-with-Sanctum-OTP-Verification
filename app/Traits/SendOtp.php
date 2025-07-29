<?php

namespace App\Traits;

use App\Models\Otp;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Random\RandomException;

trait SendOtp
{
    /**
     * @throws RandomException
     */
    public function sendOtp(User $user, string $purpose = 'Verification'): int
    {
        // Settings
        $otpLength = config('auth.otp_length', 4);
        $otpExpiryMinutes = config('auth.otp_expiry', 60);

        // Check if an unverified and unexpired OTP already exists
        $existingOtp = $user->otps()
            ->where('purpose', $purpose)
            ->where('is_verified', false)
            ->where('expires_at', '>', now())
            ->latest()
            ->first();
        if ($existingOtp) {
            // Reuse existing OTP
            $otp = $existingOtp->otp;
            $existingOtp->update(['expires_at' => now()->addMinutes($otpExpiryMinutes)]);
            Log::info("OTP reused for {$user->email} [$purpose]: $otp");
        } else {
            // Generate a new OTP
            $otp = random_int(
                (int) str_pad('1', $otpLength, '0'),
                (int) str_pad('9', $otpLength, '9')
            );

            $user->otps()->create([
                'otp'         => $otp,
                'purpose'     => $purpose,
                'expires_at'  => now()->addMinutes($otpExpiryMinutes),
                'is_verified' => false,
            ]);
            Log::info("New OTP generated for {$user->email} [$purpose]: $otp");
        }
        // Send OTP via email
//        try {
//            Mail::to($user->email)->send(new OtpMail($otp, $user, $purpose));
//        } catch (Exception $e) {
//            Log::error("Failed to send OTP to {$user->email} [$purpose]: {$e->getMessage()}");
//        }
        return (int) $otp;
    }
}
