<?php

namespace App\Filament\Admin\Resources\Bagians\Pages;

use App\Filament\Admin\Resources\Bagians\BagianResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBagian extends CreateRecord
{
    protected static string $resource = BagianResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
