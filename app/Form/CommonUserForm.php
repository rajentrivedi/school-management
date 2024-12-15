<?php

namespace App\Form;

use Filament\Tables\Columns\TextColumn;

class CommonUserForm
{
    public static function getForm() : array
    {
        return [
            TextColumn::make('name'),
            TextColumn::make('email'),
            TextColumn::make('roles.name')->separator(','),
        ];
    }
}
