<?php

namespace App\Filament\Admin\Resources\Users\RelationManagers;

use App\Models\Classification;
use App\Models\Unit;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Infolists;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Section;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ReportsRelationManager extends RelationManager
{
    protected static string $relationship = 'reports';

    protected static ?string $title = 'User Report Data';

    // ─── Table ────────────────────────────────────────────────────────────────
    public function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query
                ->with(['classification', 'unit', 'evidence'])   // eager load — zero N+1
                ->orderBy('report_date', 'desc')
            )
            ->columns([
                Tables\Columns\TextColumn::make('report_date')
                    ->label('Report Date')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('classification.name')
                    ->label('Classification')
                    ->badge(),

                Tables\Columns\TextColumn::make('unit.name')
                    ->label('Unit')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->limit(60)
                    ->tooltip(fn ($state) => $state),

                Tables\Columns\TextColumn::make('target')
                    ->numeric(decimalPlaces: 2)
                    ->sortable(),

                Tables\Columns\TextColumn::make('realization')
                    ->numeric(decimalPlaces: 2)
                    ->sortable(),

                Tables\Columns\TextColumn::make('achievement')
                    ->label('Achievement (%)')
                    ->formatStateUsing(fn ($state) => number_format($state, 2) . '%')
                    ->sortable()
                    ->badge()
                    ->color(fn ($state) => match (true) {
                        $state >= 90  => 'success',
                        $state >= 70  => 'warning',
                        default       => 'danger',
                    }),

                Tables\Columns\TextColumn::make('evidence_count')
                    ->label('Evidence')
                    ->counts('evidence')
                    ->badge()
                    ->color('info'),
            ])
            ->filters([
                // ── Date range ─────────────────────────────────────────────
                Tables\Filters\Filter::make('date_range')
                    ->form([
                        Forms\Components\DatePicker::make('start_date')->label('From'),
                        Forms\Components\DatePicker::make('end_date')->label('To'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['start_date'], fn ($q, $v) => $q->whereDate('report_date', '>=', $v))
                            ->when($data['end_date'],   fn ($q, $v) => $q->whereDate('report_date', '<=', $v));
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['start_date']) $indicators[] = 'From: ' . $data['start_date'];
                        if ($data['end_date'])   $indicators[] = 'To: '   . $data['end_date'];
                        return $indicators;
                    }),

                // ── Classification ─────────────────────────────────────────
                Tables\Filters\SelectFilter::make('classification_id')
                    ->label('Classification')
                    ->relationship('classification', 'name')
                    ->searchable()
                    ->preload(),

                // ── Unit ───────────────────────────────────────────────────
                Tables\Filters\SelectFilter::make('unit_id')
                    ->label('Unit')
                    ->relationship('unit', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->filtersLayout(Tables\Enums\FiltersLayout::AboveContent)
            ->recordAction('view')
            ->actions([
                ViewAction::make()
                    ->infolist([
                        Section::make('Report Detail')->schema([
                            Infolists\Components\TextEntry::make('report_date')->date('d M Y'),
                            Infolists\Components\TextEntry::make('classification.name')->badge(),
                            Infolists\Components\TextEntry::make('unit.name')->badge()->color('gray'),
                            Infolists\Components\TextEntry::make('target')->numeric(decimalPlaces: 2),
                            Infolists\Components\TextEntry::make('realization')->numeric(decimalPlaces: 2),
                            Infolists\Components\TextEntry::make('achievement')
                                ->formatStateUsing(fn ($state) => number_format($state, 2) . '%'),
                            Infolists\Components\TextEntry::make('description')->columnSpanFull(),
                        ])->columns(3),

                        Section::make('Evidence Files')->schema([
                            Infolists\Components\RepeatableEntry::make('evidence')
                                ->schema([
                                    Infolists\Components\TextEntry::make('file_path')
                                        ->label('File')
                                        ->url(fn ($state) => asset('storage/' . $state), true),
                                ])
                                ->columns(1),
                        ]),
                    ]),
            ]);
    }
}