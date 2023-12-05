<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Role_module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $module=Module::all();

        for ($i = 1; $i <= 35; $i++) {

        Role_module::create([
                'module_id' => $i,
                'role_id' => 1
            ]);
    }
    }
}
