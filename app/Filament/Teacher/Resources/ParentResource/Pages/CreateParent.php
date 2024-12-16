<?php

namespace App\Filament\Teacher\Resources\ParentResource\Pages;

use App\Filament\Teacher\Resources\ParentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateParent extends CreateRecord
{
    protected static string $resource = ParentResource::class;

    public function afterCreate()
    {
        $this->record->assignRole('Parent');
    }
}
