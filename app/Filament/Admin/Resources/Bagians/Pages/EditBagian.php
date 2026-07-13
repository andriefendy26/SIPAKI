<?php

namespace App\Filament\Admin\Resources\Bagians\Pages;

use App\Filament\Admin\Resources\Bagians\BagianResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBagian extends EditRecord
{
    protected static string $resource = BagianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
