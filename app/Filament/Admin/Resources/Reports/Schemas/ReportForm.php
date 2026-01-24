<?php

namespace App\Filament\Admin\Resources\Reports\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Slider;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ReportForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Section::make('Laporan')
                // ->schema([

                // ]),
                Select::make('classification_id')
                    ->relationship('classification', 'name')
                    ->required()
                    ->label('Klasifikasi'),
                    // ->numeric(),
                Select::make('unit_id')
                    ->relationship('unit', 'name')
                    ->required()
                    // ->numeric()
                    ->label('Satuan'),
                DatePicker::make('report_date')
                    ->required()
                    ->label('Tanggal Laporan'),
                Textarea::make('description')
                    ->required()
                    ->label('Aktivitas'),
                TextInput::make('target')
                    ->required()
                    ->numeric()
                    ->label('Target'),
                TextInput::make('realization')
                    ->required()
                    ->numeric()
                    ->label('Realisasi'),
                Slider::make('achievement')
                    ->required()
                    // ->numeric()
                    ->range(minValue: 0, maxValue: 100)
                    ->step(1)
                    ->tooltips()
                    ->label('Capaian (%)'),
            ]);
    }
}
