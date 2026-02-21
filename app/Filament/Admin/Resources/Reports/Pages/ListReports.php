<?php

namespace App\Filament\Admin\Resources\Reports\Pages;

use App\Filament\Admin\Resources\Reports\ReportResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListReports extends ListRecords
{
    protected static string $resource = ReportResource::class;


    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['user_id'] = Auth::id();

        return $data;
    }
    
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
