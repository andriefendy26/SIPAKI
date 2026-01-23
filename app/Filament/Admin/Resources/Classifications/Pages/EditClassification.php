<?php

namespace App\Filament\Admin\Resources\Classifications\Pages;

use App\Filament\Admin\Resources\Classifications\ClassificationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditClassification extends EditRecord
{
    protected static string $resource = ClassificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
