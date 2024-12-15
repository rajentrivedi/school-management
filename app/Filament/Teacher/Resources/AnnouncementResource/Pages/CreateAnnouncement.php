<?php

namespace App\Filament\Teacher\Resources\AnnouncementResource\Pages;

use App\Models\User;
use Filament\Actions;
use Illuminate\Support\Arr;
use App\Mail\NewAnnoucementMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Teacher\Resources\AnnouncementResource;

class CreateAnnouncement extends CreateRecord
{
    protected static string $resource = AnnouncementResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();
        return $data;
    }

    protected function afterCreate(): void
    {
        if($this->record)
        {
            if ($this->record && in_array($this->record->announcement_for, ['parents', 'students', 'both'])) {
                $roles = match ($this->record->announcement_for) {
                    'parents' => ['Parent'],
                    'students' => ['Student'],
                    'both' => ['Parent', 'Student'],
                };
                $users = User::role($roles)->get();
                $users->each(fn($user) => Mail::to($user)->send(new NewAnnoucementMail($this->record)));
            }
        }
    }
}
