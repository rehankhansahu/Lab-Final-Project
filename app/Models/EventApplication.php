<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventApplication extends Model
{
    protected $table = 'event_applications';

    protected $fillable = [
        'volunteer_id',
        'event_id',
        'status',
    ];

    // Belongs to a volunteer
    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class, 'volunteer_id');
    }

    // Belongs to an event
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}