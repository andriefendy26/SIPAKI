<?php

namespace App\Filament\Admin\Resources\Classifications\Schemas;

use Dom\Text;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class ClassificationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make('name')
                    ->label('Classification Name')
                    ->required()
                    ->maxLength(255),
                CheckboxList::make('bagian')
                    ->label('Bagian')
                    ->relationship('bagian', 'name')
                    ->columns(2)
                // Select::make('id_bagian')
                //     ->label('Bagian')
                //     ->relationship('bagian', 'name')
                //     ->required(),
                    // ->searchable(),
            ]);
    }
}
    