<?php

namespace App\Filament\Teacher\Resources\ParentResource\Pages;

use App\Filament\Teacher\Resources\ParentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditParent extends EditRecord
{
    protected static string $resource = ParentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
