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
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create jobs']);
        Permission::create(['name' => 'delete jobs']);
        Permission::create(['name' => 'post jobs']);


        // update cache to know about the newly created permissions (required if using WithoutModelEvents in seeders)
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        // create roles and assign created permissions

        // this can be done as separate statements

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $userrole = Role::create(['name' => 'user']);

        // first-user
        $user = User::all();
        if ($user->isEmpty()) {
            return;
        }
        $user->first()->assignRole($admin);

        $user->skip(1)->each(function ($user) use ($userrole) {
            $user->assignRole($userrole);
        });
    }
}
