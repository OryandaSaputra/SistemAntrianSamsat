<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::firstOrCreate(['role' => 'admin']);
        Role::firstOrCreate(['role' => 'warga']);

        $adminEmail = config('sanras.admin_email');
        $adminPassword = config('sanras.admin_password');

        if ($adminEmail && $adminPassword) {
            User::updateOrCreate(
                ['email' => $adminEmail],
                [
                    'name' => config('sanras.admin_name', 'Administrator SANRAS'),
                    'password' => Hash::make($adminPassword),
                    'role_id' => $adminRole->id,
                ]
            );
        }
    }
}
