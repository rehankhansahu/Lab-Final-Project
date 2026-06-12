<?php

use Illuminate\Support\Facades\Route;

// ─── PUBLIC ROUTES ────────────────────────────────────────────────
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ─── VOLUNTEER AUTH ROUTES ─────────────────────────────────────────
Route::prefix('volunteer')->name('volunteer.')->group(function () {

    // Guest-only routes
    Route::middleware('guest')->group(function () {
        Route::get('/register', [\App\Http\Controllers\Volunteer\VolunteerAuthController::class, 'showRegister'])->name('register');
        Route::post('/register', [\App\Http\Controllers\Volunteer\VolunteerAuthController::class, 'register']);

        Route::get('/login', [\App\Http\Controllers\Volunteer\VolunteerAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [\App\Http\Controllers\Volunteer\VolunteerAuthController::class, 'login']);
    });

    // Authenticated volunteer routes
    Route::middleware('volunteer')->group(function () {
        Route::post('/logout', [\App\Http\Controllers\Volunteer\VolunteerAuthController::class, 'logout'])->name('logout');

        // Dashboard
        Route::get('/dashboard', [\App\Http\Controllers\Volunteer\VolunteerDashboardController::class, 'index'])->name('dashboard');

        // Events
        Route::get('/events', [\App\Http\Controllers\Volunteer\VolunteerEventController::class, 'index'])->name('events');
        Route::get('/events/{event}', [\App\Http\Controllers\Volunteer\VolunteerEventController::class, 'show'])->name('events.show');
        Route::post('/events/{event}/apply', [\App\Http\Controllers\Volunteer\VolunteerEventController::class, 'apply'])->name('events.apply');

        // Applications
        Route::get('/applications', [\App\Http\Controllers\Volunteer\VolunteerApplicationController::class, 'index'])->name('applications');

        // Roles
        Route::get('/roles', [\App\Http\Controllers\Volunteer\VolunteerRoleController::class, 'index'])->name('roles');

        // Attendance
        Route::get('/attendance', [\App\Http\Controllers\Volunteer\VolunteerAttendanceController::class, 'index'])->name('attendance');

        // Certificates
        Route::get('/certificates', [\App\Http\Controllers\Volunteer\VolunteerCertificateController::class, 'index'])->name('certificates');
        Route::get('/certificates/{certificate}/download', [\App\Http\Controllers\Volunteer\VolunteerCertificateController::class, 'download'])->name('certificates.download');
    });
});

// ─── ADMIN ROUTES ──────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {

    // Admin guest-only routes
    Route::get('/login', [\App\Http\Controllers\Admin\AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Admin\AdminAuthController::class, 'login']);

    // Authenticated admin routes
    Route::middleware('admin')->group(function () {
        Route::post('/logout', [\App\Http\Controllers\Admin\AdminAuthController::class, 'logout'])->name('logout');

        // Dashboard
        Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('dashboard');

        // Events (Gemini Route Added Here)
        Route::post('/events/generate-description', [\App\Http\Controllers\Admin\EventController::class, 'generateDescription'])->name('events.generate-description');
        Route::resource('events', \App\Http\Controllers\Admin\EventController::class);
        Route::get('/events/{event}/volunteers', [\App\Http\Controllers\Admin\EventController::class, 'volunteers'])->name('events.volunteers');

        // Volunteers
        Route::get('/volunteers', [\App\Http\Controllers\Admin\VolunteerManagerController::class, 'index'])->name('volunteers.index');
        Route::get('/volunteers/{volunteer}', [\App\Http\Controllers\Admin\VolunteerManagerController::class, 'show'])->name('volunteers.show');

        // Applications
        Route::get('/applications', [\App\Http\Controllers\Admin\ApplicationController::class, 'index'])->name('applications.index');
        Route::patch('/applications/{application}/approve', [\App\Http\Controllers\Admin\ApplicationController::class, 'approve'])->name('applications.approve');
        Route::patch('/applications/{application}/reject', [\App\Http\Controllers\Admin\ApplicationController::class, 'reject'])->name('applications.reject');

        // Role Assignments
        Route::get('/roles', [\App\Http\Controllers\Admin\RoleAssignmentController::class, 'index'])->name('roles.index');
        Route::get('/roles/{event}/assign', [\App\Http\Controllers\Admin\RoleAssignmentController::class, 'assignForm'])->name('roles.assign');
        Route::post('/roles/{event}/assign', [\App\Http\Controllers\Admin\RoleAssignmentController::class, 'assign']);

        // Attendance
        Route::get('/attendance', [\App\Http\Controllers\Admin\AttendanceController::class, 'index'])->name('attendance.index');
        Route::get('/attendance/{event}/manage', [\App\Http\Controllers\Admin\AttendanceController::class, 'manage'])->name('attendance.manage');
        Route::post('/attendance/{event}/save', [\App\Http\Controllers\Admin\AttendanceController::class, 'save'])->name('attendance.save');

        // Certificates
        Route::get('/certificates', [\App\Http\Controllers\Admin\CertificateController::class, 'index'])->name('certificates.index');
        Route::post('/certificates/{event}/generate', [\App\Http\Controllers\Admin\CertificateController::class, 'generate'])->name('certificates.generate');
        Route::get('/certificates/all', [\App\Http\Controllers\Admin\CertificateController::class, 'all'])->name('certificates.all');
    });
});