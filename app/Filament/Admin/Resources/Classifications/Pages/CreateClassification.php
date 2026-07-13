<?php

namespace App\Filament\Admin\Resources\Classifications\Pages;

use App\Filament\Admin\Resources\Classifications\ClassificationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateClassification extends CreateRecord
{
    protected static string $resource = ClassificationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_bagian'] = auth()->user()->id_bagian;

        return $data;
    }
}
