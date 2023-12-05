<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=>'supervisor',
            'name_ar'=>'مشرف',
            'guard_name'=>'web'
        ]);

        Role::create([
            'name'=>'hr',
            'name_ar'=>'موارد بشرية',
            'guard_name'=>'web'
        ]);
        Role::create([
            'name'=>'financial',
            'name_ar'=>'ماليات',
            'guard_name'=>'web'
        ]);
        Role::create([
            'name'=>'employee',
            'name_ar'=>'موظف',
            'guard_name'=>'web'
        ]);


    }
}
