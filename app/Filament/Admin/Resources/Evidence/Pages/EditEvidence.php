<?php

namespace App\Filament\Admin\Resources\Evidence\Pages;

use App\Filament\Admin\Resources\Evidence\EvidenceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEvidence extends EditRecord
{
    protected static string $resource = EvidenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
