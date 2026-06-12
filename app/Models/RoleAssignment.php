<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleAssignment extends Model
{
    protected $table = 'role_assignments';

    protected $fillable = [
        'volunteer_id',
        'event_id',
        'role_name',
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