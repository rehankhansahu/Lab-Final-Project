<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VolunteerAuthController extends Controller
{
    // Show registration form
    public function showRegister()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('volunteer.dashboard');
        }
        return view('volunteer.auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:volunteers,email',
            'phone'      => 'required|string|max:20',
            'department' => 'required|string|max:255',
            'password'   => 'required|string|min:6|confirmed',
        ]);

        $volunteer = Volunteer::create([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'phone'      => $validated['phone'],
            'department' => $validated['department'],
            'password'   => Hash::make($validated['password']),
        ]);

        Auth::guard('web')->login($volunteer);

        return redirect()->route('volunteer.dashboard')
                         ->with('success', 'Account created successfully. Welcome!');
    }

    // Show login form
    public function showLogin()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('volunteer.dashboard');
        }
        return view('volunteer.auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('web')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('volunteer.dashboard')->with('success', 'Welcome back!');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email');
    }

    // Handle logout
    public function logout(Request $request)
{
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home')->with('success', 'You have been logged out.');
}
}