<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';

    protected $fillable = [
        'volunteer_id',
        'event_id',
        'attendance_status',
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