<?php

namespace App\Filament\Admin\Resources\Evidence;

use App\Filament\Admin\Resources\Evidence\Pages\CreateEvidence;
use App\Filament\Admin\Resources\Evidence\Pages\EditEvidence;
use App\Filament\Admin\Resources\Evidence\Pages\ListEvidence;
use App\Filament\Admin\Resources\Evidence\Schemas\EvidenceForm;
use App\Filament\Admin\Resources\Evidence\Tables\EvidenceTable;
use App\Models\Evidence;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EvidenceResource extends Resource
{
    protected static ?string $model = Evidence::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return EvidenceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EvidenceTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEvidence::route('/'),
            'create' => CreateEvidence::route('/create'),
            'edit' => EditEvidence::route('/{record}/edit'),
        ];
    }
}
