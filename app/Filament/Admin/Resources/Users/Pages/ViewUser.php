<?php

namespace App\Filament\Admin\Resources\Users\Pages;

use App\Filament\Admin\Resources\Users\UserResource;
use App\Services\UserReportService;
use Filament\Resources\Pages\ViewRecord;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    /**
     * Override record resolution so the infolist receives the aggregated
     * virtual columns (reports_count, reports_sum_*, reports_avg_*).
     */
    protected function resolveRecord(int | string $key): \App\Models\User
    {
        return app(UserReportService::class)->getUserWithReportSummary((int) $key);
    }

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\EditAction::make(),
        ];
    }
}