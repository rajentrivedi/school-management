<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'manage_teachers',
            'view_all_students',
            'view_all_parents',
            'post_admin_announcements',
            'view_all_announcements',

            'manage_students',
            'manage_parents',
            'post_teacher_announcements',

            'view_student_announcements',

            'view_parent_announcements'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->syncPermissions([
            'manage_teachers',
            'view_all_students',
            'view_all_parents',
            'post_admin_announcements',
            'view_all_announcements'
        ]);

        $teacherRole = Role::create(['name' => 'Teacher']);
        $teacherRole->syncPermissions([
            'manage_students',
            'manage_parents',
            'post_teacher_announcements',
            'view_student_announcements',
            'view_parent_announcements'
        ]);

        $studentRole = Role::create(['name' => 'Student']);
        $studentRole->syncPermissions([
            'view_student_announcements'
        ]);

        $parentRole = Role::create(['name' => 'Parent']);
        $parentRole->syncPermissions([
            'view_parent_announcements'
        ]);

        $admin = User::create([
            'name' => 'System Admin',
            'email' => 'admin@school.com',
            'password' => Hash::make('AdminPassword123!'),
            'email_verified_at' => now()
        ]);
        $admin->assignRole($adminRole);
        $teacher = User::create([
            'name' => 'Teacher',
            'email' => 'teacher@school.com',
            'password' => Hash::make('TeacherPassword123!'),
            'email_verified_at' => now()
        ]);
        $teacher->assignRole($teacherRole);
    }
}
