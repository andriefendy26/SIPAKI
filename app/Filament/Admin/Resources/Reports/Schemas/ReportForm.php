<?php

namespace App\Filament\Admin\Resources\Reports\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ReportForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('classification_id')
                    ->required()
                    ->numeric(),
                TextInput::make('unit_id')
                    ->required()
                    ->numeric(),
                DatePicker::make('report_date')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('target')
                    ->required(),
                TextInput::make('realization')
                    ->required(),
                TextInput::make('achievement')
                    ->required()
                    ->numeric(),
            ]);
    }
}
