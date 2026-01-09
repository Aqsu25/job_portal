<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // ---------------- PERMISSIONS ----------------
        $permissions = [
            'job.create',
            'job.edit',
            'job.delete',
            'job.post',
            'job.apply',
            'job.save',
            'job.like',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // ---------------- ROLES ----------------
        $admin     = Role::firstOrCreate(['name' => 'admin']);
        $employer  = Role::firstOrCreate(['name' => 'employer']);
        $jobSeeker = Role::firstOrCreate(['name' => 'job-seeker']);

        // ---------------- ASSIGN PERMISSIONS ----------------
        $admin->syncPermissions(Permission::all());

        $employer->syncPermissions([
            'job.create',
            'job.edit',
            'job.delete',
            'job.post',
        ]);

        $jobSeeker->syncPermissions([
            'job.apply',
            'job.save',
            'job.like',
        ]);

        // ---------------- ASSIGN ROLES ----------------
        $users = User::all();

        if ($users->isEmpty()) return;

        // First user → admin
        $users->first()->assignRole('admin');

        // Others → job-seeker (default)
        $users->skip(1)->each(function ($user) {
            if (!$user->hasAnyRole(['admin', 'employer'])) {
                $user->assignRole('job-seeker');
            }
        });
    }
}
