<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SuperAdmin;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Only create if no super admin exists
        if (SuperAdmin::count() === 0) {
            SuperAdmin::create([
                'username' => 'admin',
                'password' => Hash::make('admin123'),
            ]);

            $this->command->info('Super Admin created: username=admin | password=admin123');
        } else {
            $this->command->warn('Super Admin already exists. Skipped.');
        }
    }
}