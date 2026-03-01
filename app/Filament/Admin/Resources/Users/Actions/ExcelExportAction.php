<?php

namespace App\Filament\Admin\Resources\Users\Actions;

use App\Services\UserExcelExportService;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;

class ExcelExportAction
{
    /**
     * Action untuk halaman VIEW (detail user) — export laporan user yang sedang dibuka.
     * Dipasang di ViewUser::getHeaderActions()
     */
    public static function viewPageAction(): Action
    {
        return Action::make('export_excel')
            ->label('Export Excel')
            ->icon('heroicon-o-arrow-down-tray')
            ->color('success')
            ->form(self::filterForm())
            ->action(function (array $data, $record) {
                return self::runExport($record->id, $data);
            });
    }

    /**
     * Action untuk TABLE ROW — export laporan user pada baris tabel.
     * Dipasang di UserResource::table() → actions([])
     */
    public static function tableRowAction(): Action
    {
        return Action::make('export_excel')
            ->label('Export')
            ->icon('heroicon-o-arrow-down-tray')
            ->color('success')
            ->tooltip('Export Laporan Excel')
            ->form(self::filterForm())
            ->action(function (array $data, $record) {
                return self::runExport($record->id, $data);
            });
    }

    // ─── Private helpers ──────────────────────────────────────────────────────

    private static function filterForm(): array
    {
        return [
            Select::make('month')
                ->label('Bulan')
                ->options([
                    'januari'   => 'Januari',   'februari' => 'Februari',
                    'maret'     => 'Maret',      'april'    => 'April',
                    'mei'       => 'Mei',         'juni'     => 'Juni',
                    'juli'      => 'Juli',        'agustus'  => 'Agustus',
                    'september' => 'September',  'oktober'  => 'Oktober',
                    'november'  => 'November',   'desember' => 'Desember',
                ])
                ->placeholder('Semua Bulan')
                ->nullable(),

            TextInput::make('year')
                ->label('Tahun')
                ->numeric()
                ->minValue(2000)
                ->maxValue(2100)
                ->default(now()->year)
                ->placeholder('e.g. 2025'),
        ];
    }

    private static function runExport(int $userId, array $data): void
    {
        try {
            $result = app(UserExcelExportService::class)->generate(
                userId: $userId,
                month:  $data['month'] ?? null,
                year:   $data['year']  ?? null,
            );

            Notification::make()
                ->title('Export Berhasil')
                ->body('File siap diunduh.')
                ->success()
                ->actions([
                    Action::make('download')
                        ->label('Download')
                        ->url($result['url'], shouldOpenInNewTab: true)
                        ->button(),
                ])
                ->persistent()
                ->send();

        } catch (\Throwable $e) {
            Notification::make()
                ->title('Export Gagal')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }
}