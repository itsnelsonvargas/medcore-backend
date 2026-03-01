<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // User Management
            [
                'name' => 'View Users',
                'slug' => 'view-users',
                'description' => 'Can view list of users',
            ],
            [
                'name' => 'Create Users',
                'slug' => 'create-users',
                'description' => 'Can create new users',
            ],
            [
                'name' => 'Edit Users',
                'slug' => 'edit-users',
                'description' => 'Can edit user information',
            ],
            [
                'name' => 'Delete Users',
                'slug' => 'delete-users',
                'description' => 'Can delete users',
            ],

            // Patient Management
            [
                'name' => 'View Patients',
                'slug' => 'view-patients',
                'description' => 'Can view patient records',
            ],
            [
                'name' => 'Create Patients',
                'slug' => 'create-patients',
                'description' => 'Can create new patient records',
            ],
            [
                'name' => 'Edit Patients',
                'slug' => 'edit-patients',
                'description' => 'Can edit patient records',
            ],
            [
                'name' => 'Delete Patients',
                'slug' => 'delete-patients',
                'description' => 'Can delete patient records',
            ],

            // Consultation Management
            [
                'name' => 'View Consultations',
                'slug' => 'view-consultations',
                'description' => 'Can view consultations',
            ],
            [
                'name' => 'Create Consultations',
                'slug' => 'create-consultations',
                'description' => 'Can create new consultations',
            ],
            [
                'name' => 'Edit Consultations',
                'slug' => 'edit-consultations',
                'description' => 'Can edit consultations',
            ],
            [
                'name' => 'Delete Consultations',
                'slug' => 'delete-consultations',
                'description' => 'Can delete consultations',
            ],

            // Prescription Management
            [
                'name' => 'View Prescriptions',
                'slug' => 'view-prescriptions',
                'description' => 'Can view prescriptions',
            ],
            [
                'name' => 'Create Prescriptions',
                'slug' => 'create-prescriptions',
                'description' => 'Can create new prescriptions',
            ],
            [
                'name' => 'Edit Prescriptions',
                'slug' => 'edit-prescriptions',
                'description' => 'Can edit prescriptions',
            ],
            [
                'name' => 'Delete Prescriptions',
                'slug' => 'delete-prescriptions',
                'description' => 'Can delete prescriptions',
            ],

            // Medicine Management
            [
                'name' => 'View Medicines',
                'slug' => 'view-medicines',
                'description' => 'Can view medicines',
            ],
            [
                'name' => 'Create Medicines',
                'slug' => 'create-medicines',
                'description' => 'Can create new medicines',
            ],
            [
                'name' => 'Edit Medicines',
                'slug' => 'edit-medicines',
                'description' => 'Can edit medicines',
            ],
            [
                'name' => 'Delete Medicines',
                'slug' => 'delete-medicines',
                'description' => 'Can delete medicines',
            ],

            // Role & Permission Management
            [
                'name' => 'View Roles',
                'slug' => 'view-roles',
                'description' => 'Can view roles',
            ],
            [
                'name' => 'Create Roles',
                'slug' => 'create-roles',
                'description' => 'Can create new roles',
            ],
            [
                'name' => 'Edit Roles',
                'slug' => 'edit-roles',
                'description' => 'Can edit roles',
            ],
            [
                'name' => 'Delete Roles',
                'slug' => 'delete-roles',
                'description' => 'Can delete roles',
            ],
            [
                'name' => 'Manage Permissions',
                'slug' => 'manage-permissions',
                'description' => 'Can manage permissions and assign them to roles',
            ],

            // Medical Records
            [
                'name' => 'View Medical Records',
                'slug' => 'view-medical-records',
                'description' => 'Can view medical records',
            ],
            [
                'name' => 'Create Medical Records',
                'slug' => 'create-medical-records',
                'description' => 'Can create medical records',
            ],
            [
                'name' => 'Edit Medical Records',
                'slug' => 'edit-medical-records',
                'description' => 'Can edit medical records',
            ],
            [
                'name' => 'Delete Medical Records',
                'slug' => 'delete-medical-records',
                'description' => 'Can delete medical records',
            ],

            // Own Records (for patients)
            [
                'name' => 'View Own Records',
                'slug' => 'view-own-records',
                'description' => 'Can view own medical records',
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['slug' => $permission['slug']],
                $permission
            );
        }
    }
}
