<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::create([
            'id'=>1,
            'module_name'=>'Admin Dashboard'
        ]);
        Module::create([
            'id'=>2,
            'module_name'=>'Employee Dashboard'
        ]);
        Module::create([
            'id'=>3,
            'module_name'=>'All Employees'
        ]);
        Module::create([
            'id'=>4,
            'module_name'=>'Holidays'
        ]);
        Module::create([
            'id'=>5,
            'module_name'=>'Leaves (Supervisior)'
        ]);
        Module::create([
            'id'=>6,
            'module_name'=>'Leaves (HR)'
        ]);
        Module::create([
            'id'=>7,
            'module_name'=>'Leaves (Financial)'
        ]);
        Module::create([
            'id'=>8,
            'module_name'=>'Leaves (Employee)'
        ]);
        Module::create([
            'id'=>9,
            'module_name'=>'Leave Settings'
        ]);
        Module::create([
            'id'=>10,
            'module_name'=>'Attendance (Admin)'
        ]);
        Module::create([
            'id'=>11,
            'module_name'=>'Attendance (Employee)'
        ]);
        Module::create([
            'id'=>12,
            'module_name'=>'Departments'
        ]);
        Module::create([
            'id'=>13,
            'module_name'=>'Designations'
        ]);
        Module::create([
            'id'=>14,
        'module_name'=>'Overtime'
       ]);
        Module::create([
            'id'=>15,
            'module_name'=>'Add Performance'
        ]);
        Module::create([
            'id'=>16,
            'module_name'=>'Performance Appraisal'
        ]);
        Module::create([
            'id'=>17,
            'module_name'=>'performance-(employee)'
        ]);
        Module::create([
            'id'=>18,
            'module_name'=>'Employee Salary'
        ]);
        Module::create([
            'id'=>19,
            'module_name'=>'Payslip'
        ]);
        Module::create([
            'id'=>20,
            'module_name'=>'Payroll Items'
        ]);
        Module::create([
            'id'=>21,
            'module_name'=>'Promotion'
        ]);
        Module::create([
            'id'=>22,
            'module_name'=>'Resignation'
        ]);
        Module::create([
            'id'=>23,
            'module_name'=>'Termination'
        ]);
        Module::create([
            'id'=>24,
            'module_name'=>'Activities'
        ]);
        Module::create([
            'id'=>29,
            'module_name'=>'Roles & Permissions'
        ]);
        Module::create([
            'id'=>32,
            'module_name'=>'Change Password'
        ]);
        Module::create([
            'id'=>33,
            'module_name'=>'Leave Type'
        ]);
        Module::create([
            'id'=>34,
            'module_name'=>'Employee Profile'
        ]);
        Module::create([
            'id'=>35,
            'module_name'=>'Overtime (Supervisor)'
        ]);
        Module::create([
            'id'=>36,
            'module_name'=>'Project'
        ]);
        Module::create([
            'id'=>37,
            'module_name'=>'Assets'
        ]);

    }
}
