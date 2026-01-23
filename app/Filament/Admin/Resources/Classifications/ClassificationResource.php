<?php

namespace App\Filament\Admin\Resources\Classifications;

use App\Filament\Admin\Resources\Classifications\Pages\CreateClassification;
use App\Filament\Admin\Resources\Classifications\Pages\EditClassification;
use App\Filament\Admin\Resources\Classifications\Pages\ListClassifications;
use App\Filament\Admin\Resources\Classifications\Schemas\ClassificationForm;
use App\Filament\Admin\Resources\Classifications\Tables\ClassificationsTable;
use App\Models\Classification;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ClassificationResource extends Resource
{
    protected static ?string $model = Classification::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ClassificationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClassificationsTable::configure($table);
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
            'index' => ListClassifications::route('/'),
            'create' => CreateClassification::route('/create'),
            'edit' => EditClassification::route('/{record}/edit'),
        ];
    }
}
