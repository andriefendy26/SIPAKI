<?php

namespace App\Filament\Admin\Resources\Users;

use App\Filament\Admin\Resources\Users\Pages\CreateUser;
use App\Filament\Admin\Resources\Users\Pages\EditUser;
use App\Filament\Admin\Resources\Users\Pages\ListUsers;
use App\Filament\Admin\Resources\Users\Pages\ViewUser;
use App\Filament\Admin\Resources\Users\Actions\ExcelExportAction;
use App\Models\User;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;     // ✅ TextEntry lives here, NOT Schemas\Components
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;         // ✅ Layout components (Section, Grid) live in Schemas
use Filament\Schemas\Schema;                     // ✅ v4: both form() and infolist() use Schema
use Filament\Tables;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|\UnitEnum|null $navigationGroup = 'Settings';

    protected static ?string $recordTitleAttribute = 'name';

    // ─── Form ─────────────────────────────────────────────────────────────────
    // ✅ v4: signature is form(Schema $schema): Schema — NOT Form $form: Form
    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')
                ->required(),

            TextInput::make('email')
                ->email()
                ->required()
                ->unique(ignoreRecord: true),

            TextInput::make('password')
                ->password()
                ->minLength(6)
                ->dehydrateStateUsing(fn ($state) => filled($state) ? bcrypt($state) : null)
                ->dehydrated(fn ($state) => filled($state))  // prevent overwriting with null on edit
                ->nullable(),

            TextInput::make('nik'),

            TextInput::make('jabatan'),

            TextInput::make('bagian'),
        ]);
    }

    // ─── Table (index) ────────────────────────────────────────────────────────
    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query
                ->withCount('reports')
                ->withSum('reports', 'target')
                ->withSum('reports', 'realization')
                ->withAvg('reports', 'achievement')
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('jabatan')
                    ->label('Position'),

                Tables\Columns\TextColumn::make('bagian')
                    ->label('Department'),

                Tables\Columns\TextColumn::make('reports_count')
                    ->label('Total Reports')
                    ->sortable()
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('reports_sum_target')
                    ->label('Total Target')
                    ->sortable()
                    ->numeric(decimalPlaces: 2),

                Tables\Columns\TextColumn::make('reports_sum_realization')
                    ->label('Total Realization')
                    ->sortable()
                    ->numeric(decimalPlaces: 2),

                Tables\Columns\TextColumn::make('reports_avg_achievement')
                    ->label('Avg Achievement (%)')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => $state !== null ? number_format($state, 2) . '%' : '-')
                    ->badge()
                    ->color(fn ($state) => match (true) {
                        $state === null => 'gray',
                        $state >= 90    => 'success',
                        $state >= 70    => 'warning',
                        default         => 'danger',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('has_reports')
                    ->label('Has Reports')
                    ->queries(
                        true:  fn ($q) => $q->has('reports'),
                        false: fn ($q) => $q->doesntHave('reports'),
                    ),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                ExcelExportAction::tableRowAction(),   // ✅ Export Excel per user
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    // ─── Infolist (view/detail page) ──────────────────────────────────────────
    // ✅ v4 signature: infolist(Schema $schema): Schema  — NOT Infolist $infolist: Infolist
    // ✅ Top-level:    $schema->components([...])        — NOT ->schema([...])
    // ✅ Section uses: ->schema([...])                   — children still use ->schema()
    // ✅ TextEntry:    Filament\Infolists\Components\TextEntry  (NOT Schemas\Components\TextEntry)
    // ✅ Section:      Filament\Schemas\Components\Section
    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([

            // ── User profile ──────────────────────────────────────────────────
            Section::make('User Profile')
                ->schema([
                    TextEntry::make('name')
                        ->label('Full Name'),

                    TextEntry::make('email'),

                    TextEntry::make('nik')
                        ->label('NIK'),

                    TextEntry::make('jabatan')
                        ->label('Position'),

                    TextEntry::make('bagian')
                        ->label('Department'),
                ])
                ->columns(3),

            // ── Report summary ────────────────────────────────────────────────
            Section::make('Report Summary')
                ->schema([
                    TextEntry::make('reports_count')
                        ->label('Total Reports')
                        ->badge()
                        ->color('info'),

                    TextEntry::make('reports_sum_target')
                        ->label('Total Target')
                        ->numeric(decimalPlaces: 2),

                    TextEntry::make('reports_sum_realization')
                        ->label('Total Realization')
                        ->numeric(decimalPlaces: 2),

                    TextEntry::make('reports_avg_achievement')
                        ->label('Avg Achievement')
                        ->formatStateUsing(
                            fn ($state) => $state !== null ? number_format($state, 2) . '%' : '-'
                        )
                        ->badge()
                        ->color(fn ($state) => match (true) {
                            $state === null => 'gray',
                            $state >= 90    => 'success',
                            $state >= 70    => 'warning',
                            default         => 'danger',
                        }),
                ])
                ->columns(4),
        ]);
    }

    // ─── Relations / Pages ────────────────────────────────────────────────────
    public static function getRelations(): array
    {
        return [
            \App\Filament\Admin\Resources\Users\RelationManagers\ReportsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'view'   => ViewUser::route('/{record}'),
            'edit'   => EditUser::route('/{record}/edit'),
        ];
    }
}