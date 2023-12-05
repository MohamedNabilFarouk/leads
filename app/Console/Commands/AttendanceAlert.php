<?php

namespace App\Console\Commands;

use App\Models\EmailLeaveSetting;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\WorkSheet;
use DB;
use App\Models\Leaves;
use App\Models\User;
use App\Models\Absence;
use App\Models\Activites;
use App\Models\ActivityUser;
use App\Models\DeductionLimit;
use DateTime;
use NumberToWords\NumberToWords;

class AttendanceAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:AttendanceAlert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $day = Carbon::yesterday()->format('D');

        if ($day == 'Sat') {
            $i = 0;
        }
        if ($day == 'Sun') {
            $i = 1;
        }
        if ($day == 'Mon') {
            $i = 2;
        }
        if ($day == 'Tue') {
            $i = 3;
        }
        if ($day == 'Wed') {
            $i = 4;
        }
        if ($day == 'Thu') {
            $i = 5;
        }
        if ($day == 'Fri') {
            $i = 6;
        }
        $date = Carbon::yesterday()->format('Y-m-d');


        $works = WorkSheet::WhereHas('user', function ($query) {
            $query->where('deleted_at', '=', NULL);
        })->get();

        foreach ($works as $work) {
            $shift_from = json_decode($work->shift_from);
            $shift_to = json_decode($work->shift_to);
            $attendance_type = json_decode($work->attendance_type);
            if ($attendance_type[$i] != 5) {
                $m[] = [
                    'user_id' => $work->employee_id,
                    'name' => $work->user->name,
                    'basic_salary' => $work->user->basic_salary,
                    'email' => $work->user->email,
                    'shift_from' => $shift_from[$i],
                    'shift_to' => $shift_to[$i]
                ];
            }
        }
        foreach ($m as $mm) {
            $attendance = DB::connection('mongodb')->table('attendances')
                ->where('date', 'like', $date . '%')
                ->where('user_id', $mm['user_id'])
                ->first();
            $leaves = Leaves::where('user_id', $work->employee_id)
                ->where('period_from', '<=', $date)
                ->where('period_to', '>=', $date)
                ->where("approve_leave_status", '=', 'Approved')
                ->count();


            $numberToWords = new NumberToWords();
            $numberTransformer_en = $numberToWords->getNumberTransformer('en');
            $numberTransformer_ar = $numberToWords->getNumberTransformer('ar');


            if ($leaves == 0 && $attendance != null) {
                $chickIn = Carbon::parse($attendance['check_in'])->format('H:i:s');
                $shiftFrom = Carbon::parse($mm['shift_from']);
                $chickOut = Carbon::parse($attendance['check_out'])->format('H:i:s');
                $shiftTo = Carbon::parse($mm['shift_to']);
                $diffInMinutesIn = $shiftFrom->diffInMinutes($chickIn);
                $diffInMinutesOut = $shiftTo->diffInMinutes($chickOut);
                if ($chickIn <= Carbon::parse($mm['shift_from'])->format('H:i:s')) {
                    $diffInMinutesIn = 0;
                }

                if ($chickOut >= Carbon::parse($mm['shift_to'])->format('H:i:s')) {
                    $diffInMinutesOut = 0;
                }

                
                $s[] = [
                    'user_id' => $mm['user_id'],
                    'name' => $mm['name'],
                    'email' => $mm['email'],
                    'basic_salary' => $mm['basic_salary'],
                    'shift_from' => $mm['shift_from'],
                    'shift_to' => $mm['shift_to'],
                    'chickin' => $attendance['check_in'],
                    'chickout' => $attendance['check_out'],
                    'diffInMinutesIn' => $diffInMinutesIn,
                    'diffInMinutesOut' => $diffInMinutesOut,
                ];

            }

        }

        foreach ($s as $ss) {
            if ($ss['diffInMinutesIn'] >= 15) {
                if ($ss['diffInMinutesIn'] > 60) {
                    $deduction_limit = DeductionLimit::where('deduction_type', '>60')
                        ->where('type', 1)
                        ->where('user_id', $ss['user_id'])
                        ->where('status', '!=', 3)
                        ->orderby('id', 'desc')
                        ->first();
                    if ($deduction_limit != '') {
                        $count_deduction = $deduction_limit->deduction_count + 1;
                    } else {
                        $count_deduction = 1;
                    }
                    if ($count_deduction == 1 || $count_deduction == 2 || $count_deduction == 3 || $count_deduction == 4) {

                        $getDeduction = EmailLeaveSetting::where('less_than', 60)
                            ->where('times', $count_deduction)
                            ->where('type', 1)
                            ->first();
                        if ($getDeduction->percentage == 0) {
                            $basic_salary = 0;
                        } else {
                            if ($getDeduction->percentage_type == 0) {
                                $basic_salary = ($ss['basic_salary'] / 30) * ($getDeduction->percentage / 100);
                            } else {
                                $basic_salary = ($ss['basic_salary'] / 30) * ($getDeduction->percentage);

                            }
                        }
                        $deduction_limit_insert = DeductionLimit::create([
                            'deduction_type' => '>60',
                            'type' => 1,
                            'user_id' => $ss['user_id'],
                            'status' => 1,
                            'minutes' => $ss['diffInMinutesIn'],
                            'date' => $date,
                            'deduction_count' => $count_deduction,
                            'amount' => $basic_salary

                        ]);
                    }
                } elseif ($ss['diffInMinutesIn'] == 15) {
                    $deduction_limit = DeductionLimit::where('deduction_type', '15')
                        ->where('type', 1)
                        ->where('user_id', $ss['user_id'])
                        ->where('status', '!=', 3)
                        ->orderby('id', 'desc')
                        ->first();
                    if ($deduction_limit != '') {
                        $count_deduction = $deduction_limit->deduction_count + 1;
                    } else {
                        $count_deduction = 1;
                    }
                    if ($count_deduction == 1 || $count_deduction == 2 || $count_deduction == 3 || $count_deduction == 4) {

                        $getDeduction = EmailLeaveSetting::where('less_than', '=', 15)
                            ->where('times', $count_deduction)
                            ->where('type', 1)
                            ->first();
                        if ($getDeduction->percentage == 0) {
                            $basic_salary = 0;
                        } else {
                            if ($getDeduction->percentage_type == 0) {
                                $basic_salary = ($ss['basic_salary'] / 30) * ($getDeduction->percentage / 100);
                            } else {
                                $basic_salary = ($ss['basic_salary'] / 30) * ($getDeduction->percentage);

                            }
                        }
                        $deduction_limit_insert = DeductionLimit::create([
                            'deduction_type' => '15',
                            'type' => 1,
                            'user_id' => $ss['user_id'],
                            'status' => 1,
                            'minutes' => $ss['diffInMinutesIn'],
                            'date' => $date,
                            'deduction_count' => $count_deduction,
                            'amount' => $basic_salary

                        ]);
                    }
                } else {
                    if ($diffInMinutesIn > 15 and $diffInMinutesIn <= 30) {
                        $deduction_type = '>15<=30';
                    }
                    if ($diffInMinutesIn > 30 and $diffInMinutesIn <= 60) {
                        $deduction_type = '>30<=60';
                    }
                    if ($count_deduction == 1 || $count_deduction == 2 || $count_deduction == 3 || $count_deduction == 4) {

                        $deduction_limit = DeductionLimit::where('deduction_type', $deduction_type)
                            ->where('type', 1)
                            ->where('user_id', $ss['user_id'])
                            ->where('status', '!=', 3)
                            ->orderby('id', 'desc')
                            ->first();
                        if ($deduction_limit != '') {
                            $count_deduction = $deduction_limit->deduction_count + 1;
                        } else {
                            $count_deduction = 1;
                        }

                        if ($count_deduction == 1 || $count_deduction == 2 || $count_deduction == 3 || $count_deduction == 4) {

                            $getDeduction = EmailLeaveSetting::where('more_than', '>', $diffInMinutesIn)
                                ->where('less_than', '<=', $diffInMinutesIn)
                                ->where('times', $count_deduction)
                                ->where('type', 1)
                                ->first();
                            if ($getDeduction->percentage == 0) {
                                $basic_salary = 0;
                            } else {
                                if ($getDeduction->percentage_type == 0) {
                                    $basic_salary = ($ss['basic_salary'] / 30) * ($getDeduction->percentage / 100);
                                } else {
                                    $basic_salary = ($ss['basic_salary'] / 30) * ($getDeduction->percentage);

                                }
                            }
                            $deduction_limit_insert = DeductionLimit::create([
                                'deduction_type' => $deduction_type,
                                'type' => 1,
                                'user_id' => $ss['user_id'],
                                'status' => 1,
                                'minutes' => $ss['diffInMinutesIn'],
                                'date' => $date,
                                'deduction_count' => $count_deduction,
                                'amount' => $basic_salary

                            ]);
                        }
                    }
                }

                if ($count_deduction == 1 || $count_deduction == 2 || $count_deduction == 3 || $count_deduction == 4) {

                    $percentage = $getDeduction->percentage;
                    $percentage_type = $getDeduction->percentage_type;

                    if ($count_deduction == 1) {
                        $times_en = 'first';
                        $times_ar = 'لأول';

                    }
                    if ($count_deduction == 2) {
                        $times_en = 'second';
                        $times_ar = 'لثاني';
                    }
                    if ($count_deduction == 3) {
                        $times_en = 'third';
                        $times_ar = 'لثالث';
                    }
                    if ($count_deduction == 4) {
                        $times_en = 'fourth';
                        $times_ar = 'لرابع';
                    }
                    if ($percentage == 0) {
                        $text_en = 'This is a written warning for the disruption
                                                      caused to your colleagues';
                        $text_ar = ' هذا المرسول يعد انذار كتابي';

                    } else {
                        if ($percentage_type == 0) {
                            $text_en = 'This is a notification of a deduction of ' . $percentage . '%
                        from your daily salary, according to the
                                                 internal work regulations';
                            $text_ar = '  هذا المرسول يعد اخطار بخصم
                                                 ' . $percentage . '           %من راتبك اليومي حسب لائحة العمل/
                                                              الداخلية';
                        } else {
                            $text_en = 'This is a notification of a deduction of  ' . $numberTransformer_en->toWords($percentage) .
                                ' full day from your monthly salary, according
                                                  to the internal work regulations';
                            $text_ar = ' هذا المرسول يعد اخطار بخصم ' . $numberTransformer_ar->toWords($percentage) . ' يوم
              كامل من راتبك الشهري حسب لائحة العمل
             الداخلية';
                        }
                    }
                    $details = [
                        'title' => 'Attendance',
                        'name' => $ss['name'],
                        'body' => $text_en . ', due to the delay
                                                 and disruption caused to your colleagues by
                                                 your late arrival to work of ' . $ss['diffInMinutesIn'] . ' minutes for the
                                                 ' . $times_en . ' time in the same month',
                        'body_ar' => $text_ar . '، وذلك لما تسببت به من الحاق ضرر
                                                             وتعطيل لزملائك لوصولك متاخرا عن العمل
                                                       ' . $ss['diffInMinutesIn'] . '     دقيقة

                                                             وذلك ' . $times_ar . ' مرة بنفس الشهر'
                    ];
                    \Mail::to($ss['email'])->send(new \App\Mail\MyEmail(@$details));
                }
            }
            if ($ss['diffInMinutesOut'] >= 15) {
                if ($ss['diffInMinutesOut'] == 15) {
                    $deduction_limit = DeductionLimit::where('deduction_type', '15')
                        ->where('type', 2)
                        ->where('user_id', $ss['user_id'])
                        ->where('status', '!=', 3)
                        ->orderby('id', 'desc')
                        ->first();
                    if ($deduction_limit != '') {
                        $count_deduction = $deduction_limit->deduction_count + 1;
                    } else {
                        $count_deduction = 1;
                    }

                    if ($count_deduction == 1 || $count_deduction == 2 || $count_deduction == 3 || $count_deduction == 4) {
                        $getDeduction = EmailLeaveSetting::where('less_than', 15)
                            ->where('times', $count_deduction)
                            ->where('type', 2)
                            ->first();
                        if ($getDeduction->percentage == 0) {
                            $basic_salary = 0;
                        } else {
                            if ($getDeduction->percentage_type == 0) {
                                $basic_salary = ($ss['basic_salary'] / 30) * ($getDeduction->percentage / 100);
                            } else {
                                $basic_salary = ($ss['basic_salary'] / 30) * ($getDeduction->percentage);

                            }
                        }
                        $deduction_limit_insert = DeductionLimit::create([
                            'deduction_type' => '15',
                            'type' => 2,
                            'user_id' => $ss['user_id'],
                            'status' => 1,
                            'minutes' => $ss['diffInMinutesOut'],
                            'date' => $date,
                            'deduction_count' => $count_deduction,
                            'amount' => $basic_salary

                        ]);
                    }
                } elseif ($ss['diffInMinutesOut'] > 15) {
                    $deduction_limit = DeductionLimit::where('deduction_type', '15')
                        ->where('type', 2)
                        ->where('user_id', $ss['user_id'])
                        ->where('status', '!=', 3)
                        ->orderby('id', 'desc')
                        ->first();
                    if ($deduction_limit != '') {
                        $count_deduction = $deduction_limit->deduction_count + 1;
                    } else {
                        $count_deduction = 1;
                    }
                    if ($count_deduction == 1 || $count_deduction == 2 || $count_deduction == 3 || $count_deduction == 4) {

                        $getDeduction = EmailLeaveSetting::where('more_than', '=', 15)
                            ->where('times', $count_deduction)
                            ->where('type', 2)
                            ->first();
                        if ($getDeduction->percentage == 0) {
                            $basic_salary = 0;
                        } else {
                            if ($getDeduction->percentage_type == 0) {
                                $basic_salary = ($ss['basic_salary'] / 30) * ($getDeduction->percentage / 100);
                            } else {
                                $basic_salary = ($ss['basic_salary'] / 30) * ($getDeduction->percentage);

                            }
                        }
                        $deduction_limit_insert = DeductionLimit::create([
                            'deduction_type' => '15',
                            'type' => 2,
                            'user_id' => $ss['user_id'],
                            'status' => 1,
                            'minutes' => $ss['diffInMinutesOut'],
                            'date' => $date,
                            'deduction_count' => $count_deduction,
                            'amount' => $basic_salary

                        ]);

                    }
                }
                if ($count_deduction == 1 || $count_deduction == 2 || $count_deduction == 3 || $count_deduction == 4) {

                    $percentage = $getDeduction->percentage;
                    $percentage_type = $getDeduction->percentage_type;

                    if ($count_deduction == 1) {
                        $times_en = 'first';
                        $times_ar = 'لأول';

                    }
                    if ($count_deduction == 2) {
                        $times_en = 'second';
                        $times_ar = 'لثاني';
                    }
                    if ($count_deduction == 3) {
                        $times_en = 'third';
                        $times_ar = 'لثالث';
                    }
                    if ($count_deduction == 4) {
                        $times_en = 'fourth';
                        $times_ar = 'لرابع';
                    }
                    if ($percentage == 0) {
                        $text_en = 'This is a written warning';

                        $text_ar = ' هذا المرسول يعد انذار كتابي';

                    } else {
                        if ($percentage_type == 0) {
                            $text_en = 'This is a notification of a deduction of ' . $percentage . '% from your daily salary';
                            $text_ar = 'هذا المرسول يعد اخطار بخصم
                                          ' . $percentage . ' %من راتبك اليومي ';

                        } else {
                            $text_en = 'This is a notification of a deduction of ' . $numberTransformer_en->toWords($percentage) . ' full
                                 day from your monthly salary';

                            $text_ar = ' هذا المرسول يعد اخطار بخصم
             ' . $numberTransformer_ar->toWords($percentage) . ' كامل من راتبك الشهري';

                        }
                    }
                    $details = [
                        'title' => 'Attendance',
                        'name' => $ss['name'],
                        'body' => $text_en . ', your early
                                        departure from work on ' . $ss['diffInMinutesOut'] . ' minutes occasions in
                                        the same month without providing any
                                        excuses, as this may cause disruption to your
                                        colleagues and your work',
                                                                'body_ar' => $text_ar . ' بسبب انصرافك عن العمل
                                                     مبكرا ' . $times_ar . ' مرات بنفس الشهر دون ابداء اي
                                                     اعذار، وذلك لما قد تسبب بالحاق ضرر أوتعطيل
                                         لزملائك ولعملك'
                                                            ];
                                          \Mail::to($ss['email'])->send(new \App\Mail\MyEmail(@$details));
                                                        }

            }
        }
    


        return Command::SUCCESS;
    }
}
