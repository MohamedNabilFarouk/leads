<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Module;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            RoleSeeder::class,
            // RoleModelSeeder::class,
            ModulesSeeder::class,
            RoleModuleSeeder::class,
            // ModelSeeder::class,
            // PermissionSeeder::class,
//            ModelPermissionSeeder::class,
            // ModelRoleSeeder::class,
            // RolePermissionSeeder::class,
            CountrySeeder::class,
            TerminationTypeSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
