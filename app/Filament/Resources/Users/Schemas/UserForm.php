<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('fname')
                    ->required(),
                TextInput::make('lname')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->required(),
                Select::make('user_type')
                    ->options(['admin' => 'Admin', 'user' => 'User', 'manager' => 'Manager'])
                    ->required(),
                DateTimePicker::make('reset_password_token_expire_at'),
                Toggle::make('is_verified')
                    ->required(),
                DateTimePicker::make('verified_at'),
                Toggle::make('terms_and_conditions')
                    ->required(),
            ]);
    }
}
