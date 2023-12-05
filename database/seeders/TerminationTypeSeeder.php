<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TerminationType;
class TerminationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TerminationType::create([
            'termination_name'=>'Interruption of work',
            'termination_name_ar'=>'الانقطاع عن العمل',
        ]);

        TerminationType::create([
            'termination_name'=>'health disability',
            'termination_name_ar'=>'العجز الصحي',
        ]);
        TerminationType::create([
            'termination_name'=>'Disciplinary dismissal',
            'termination_name_ar'=>'الفصل التأديبي ',
        ]);
        TerminationType::create([
            'termination_name'=>'Dismissal in the public interest',
            'termination_name_ar'=>'الفصل للمصلحة العامة',
        ]);
        TerminationType::create([
            'termination_name'=>'Unfair dismissal',
            'termination_name_ar'=>'الفصل التعسفي',
        ]);
        TerminationType::create([
            'termination_name'=>'the retirement',
            'termination_name_ar'=>'التقاعد',
        ]);


    }
}
