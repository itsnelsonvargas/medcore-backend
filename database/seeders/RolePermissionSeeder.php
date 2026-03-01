<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Super Admin - All permissions
        $superAdmin = Role::where('slug', 'super-admin')->first();
        if ($superAdmin) {
            $superAdmin->permissions()->sync(Permission::pluck('id'));
        }

        // Admin - Most permissions except super admin specific ones
        $admin = Role::where('slug', 'admin')->first();
        if ($admin) {
            $adminPermissions = Permission::whereNotIn('slug', [
                'manage-permissions', // Only super admin can manage permissions
            ])->pluck('id');
            $admin->permissions()->sync($adminPermissions);
        }

        // Doctor - Patient care and medical records
        $doctor = Role::where('slug', 'doctor')->first();
        if ($doctor) {
            $doctor->permissions()->sync(Permission::whereIn('slug', [
                'view-patients',
                'create-patients',
                'edit-patients',
                'view-consultations',
                'create-consultations',
                'edit-consultations',
                'view-prescriptions',
                'create-prescriptions',
                'edit-prescriptions',
                'view-medicines',
                'view-medical-records',
                'create-medical-records',
                'edit-medical-records',
            ])->pluck('id'));
        }

        // Nurse - Limited patient care access
        $nurse = Role::where('slug', 'nurse')->first();
        if ($nurse) {
            $nurse->permissions()->sync(Permission::whereIn('slug', [
                'view-patients',
                'view-consultations',
                'view-prescriptions',
                'view-medicines',
                'view-medical-records',
                'create-medical-records',
                'edit-medical-records',
            ])->pluck('id'));
        }

        // Patient - Only own records
        $patient = Role::where('slug', 'patient')->first();
        if ($patient) {
            $patient->permissions()->sync(Permission::whereIn('slug', [
                'view-own-records',
            ])->pluck('id'));
        }
    }
}
