<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\Jobdetail;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        User::factory(5)->create();
        Category::factory(5)->create();
        Type::factory(5)->create();
        Company::factory(5)->create();
        Jobdetail::factory(5)->create();

         $this->call([
            RolePermissionSeeder::class,
        ]);
    }
}
