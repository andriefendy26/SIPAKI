<?php

namespace App\Filament\Admin\Resources\Evidence\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EvidenceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('report_id')
                    ->required()
                    ->numeric(),
                TextInput::make('file_path')
                    ->required(),
            ]);
    }
}
