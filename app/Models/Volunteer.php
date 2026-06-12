<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Volunteer extends Authenticatable
{
    use Notifiable;

    protected $table = 'volunteers';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'department',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    // A volunteer has many event applications
    public function applications()
    {
        return $this->hasMany(EventApplication::class, 'volunteer_id');
    }

    // A volunteer has many role assignments
    public function roleAssignments()
    {
        return $this->hasMany(RoleAssignment::class, 'volunteer_id');
    }

    // A volunteer has many attendance records
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'volunteer_id');
    }

    // A volunteer has many certificates
    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'volunteer_id');
    }
}