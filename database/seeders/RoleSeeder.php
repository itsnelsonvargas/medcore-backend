<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Super Admin',
                'slug' => 'super-admin',
                'description' => 'Full system access with all permissions',
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Administrative access to manage the system',
            ],
            [
                'name' => 'Doctor',
                'slug' => 'doctor',
                'description' => 'Medical professional with patient care access',
            ],
            [
                'name' => 'Patient',
                'slug' => 'patient',
                'description' => 'Patient with access to their own medical records',
            ],
            [
                'name' => 'Nurse',
                'slug' => 'nurse',
                'description' => 'Nursing staff with patient care access',
            ],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(
                ['slug' => $role['slug']],
                $role
            );
        }
    }
}
