<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table = 'certificates';

    protected $fillable = [
        'volunteer_id',
        'event_id',
        'issue_date',
    ];

    protected $casts = [
        'issue_date' => 'date',
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