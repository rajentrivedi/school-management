<?php

namespace App\Models;

use App\Observers\AnnouncementObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[ObservedBy([AnnouncementObserver::class])]
class Announcement extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];

    public function creator() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function teachers() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'announcement_teacher', 'announcement_id', 'teacher_id');
    }
}
