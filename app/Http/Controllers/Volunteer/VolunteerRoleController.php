<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\RoleAssignment;
use Illuminate\Support\Facades\Auth;

class VolunteerRoleController extends Controller
{
    public function index()
    {
        $volunteerId = Auth::guard('web')->id();

        $roles = RoleAssignment::where('volunteer_id', $volunteerId)
            ->with('event')
            ->latest()
            ->get();

        return view('volunteer.roles.index', compact('roles'));
    }
}