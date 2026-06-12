<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'event_name',
        'event_date',
        'venue',
        'description',
        'required_volunteers',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    // An event has many applications
    public function applications()
    {
        return $this->hasMany(EventApplication::class, 'event_id');
    }

    // Approved applications
    public function approvedApplications()
    {
        return $this->hasMany(EventApplication::class, 'event_id')->where('status', 'approved');
    }

    // An event has many role assignments
    public function roleAssignments()
    {
        return $this->hasMany(RoleAssignment::class, 'event_id');
    }

    // An event has many attendance records
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'event_id');
    }

    // An event has many certificates
    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'event_id');
    }

    // Volunteers who applied (through applications)
    public function volunteers()
    {
        return $this->belongsToMany(Volunteer::class, 'event_applications', 'event_id', 'volunteer_id')
                    ->withPivot('status')
                    ->withTimestamps();
    }
}