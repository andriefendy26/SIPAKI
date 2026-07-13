<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('username')
                    ->label('Username')
                    ->required(),
                FileUpload::make('photo_profile')
                    ->label('Photo Profile')
                    ->image()
                    ->disk('public')
                    ->directory('profiles')
                    ->maxSize(1024) // 1MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif']),
                TextInput::make('nik'),
                TextInput::make('jabatan'),
                // TextInput::make('bagian'),
                Select::make('id_bagian')
                    ->label('Bagian')
                    // ->relationship('bagian', 'name')
                    ->relationship(name: 'bagian', titleAttribute: 'name')
                    // ->loadingMessage('Loading Bagian...')
                    ->required(),
                    // ->searchable(),
                // DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->required(),
            ]);
    }
}
