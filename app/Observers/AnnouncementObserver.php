<?php

namespace App\Observers;

use App\Models\Announcement;

class AnnouncementObserver
{
    /**
     * Handle the Announcemennt "created" event.
     */
    public function created(Announcement $announcemennt): void
    {
        // As I am using filament, filament provides afterCreate hook so I have used it otherwise I would have to use this method of observer.
    }

    /**
     * Handle the Announcemennt "updated" event.
     */
    public function updated(Announcement $announcemennt): void
    {
        //
    }

    /**
     * Handle the Announcemennt "deleted" event.
     */
    public function deleted(Announcement $announcemennt): void
    {
        //
    }

    /**
     * Handle the Announcemennt "restored" event.
     */
    public function restored(Announcement $announcemennt): void
    {
        //
    }

    /**
     * Handle the Announcemennt "force deleted" event.
     */
    public function forceDeleted(Announcement $announcemennt): void
    {
        //
    }
}
