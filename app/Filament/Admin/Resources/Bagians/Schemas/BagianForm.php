<?php

namespace App\Filament\Admin\Resources\Bagians\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BagianForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
