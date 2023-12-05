<?php

namespace App\Http\Livewire;

use App\Models\Absence;
use App\Models\Activites;
use App\Models\ActivityUser;
use App\Models\Holiday;
use App\Models\Leave_setting;
use App\Models\Leaves;
use App\Models\Loan;
use App\Models\Overtime;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Carbon;
use DB;
use DateTime;
use App\Models\User_leaves_custom_policy;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class MissingInfoComponent extends Component
{
    use WithFileUploads;
    public $photo,$lat,$lng,$radius,$nfc_id,$employees_number,$company_business,$company_name,
    $currency,$country,$business_registration_number;



    // public function storeMissingInfo(Request $request)
    // {
    //     $this->validate([
    //         'lat'  => 'required',
    //         'lng' => 'required',
    //         'radius'=> 'required',
    //         'nfc_id'  => 'required',
    //         'employees_number' => 'required',
    //         'company_name' => 'required',
    //         'company_business'=> 'required',
    //         'currency'  => 'required',
    //         'country' => 'required',
    //         'business_registration_number'=> 'required',
    //         'photo' => 'required',
    //     ]);


    //     $slug = explode(".",$_SERVER['HTTP_HOST'])[0];
    //     $client = \DB::connection('general')->table('clients')->where('slug',$slug)->update([
    //        "lat" => $this->lat,
    //        "lng" => $this->lng,
    //        "radius" => $this->radius,
    //        "nfc_id" => $this->nfc_id,
    //        "photo" => "",
    //        "employees_number" => $this->employees_number,
    //        "company_business" => $this->company_business,
    //        "company_name" => $this->company_name,
    //        "currency" => $this->currency,
    //        "country" => $this->country,
    //        "business_registration_number" => $this->business_registration_number
    //     ]);


    //     return redirect('en/my-dashboard');
    // }

    public function render()
    {

        $user_id    = auth()->user()->id;
        $user       = User::where('id',$user_id)->first();
        $nowEmployee = Carbon::now()->format('D, d M Y');
        $activities = ActivityUser::where('receive_id',auth()->user()->id)
                                   ->where('status',null)
                                   ->orderby('id','desc')
                                   ->limit(10)
                                   ->get();
        $now = Carbon::now();

        $date = Carbon::parse($now);

        $holiday    = Holiday::whereDate('date_from','>=',$date)->orderBy('date_from')->first();

        $replacements = Leaves::where('employee_replacement',$user_id)
                            ->where('approve_leave_status','New')
                            ->get();

        $year=Carbon::now()->format('Y');
        $leaveSetting=Leave_setting::where('id',1)->first();
        @$leaveTotal=$leaveSetting->annual_days + ($leaveSetting->annual_carry_forward=='yes'?$leaveSetting->annual_carry_forward_max:0) + $leaveSetting->sick + $leaveSetting->lop_days + ($leaveSetting->lop_carry_forward=='yes'?$leaveSetting->lop_carry_forward_max:0);
        $leaves = Leaves::where('user_id',$user_id)->where('period_from','like',$year.'-%')->where('period_to','like',$year.'-%')->get();
        $leavesTakes = 0;
        foreach($leaves as $leave){
            $formatted_dt1=Carbon::parse($leave->period_from);

            $formatted_dt2=Carbon::parse($leave->period_to);

            $date_diff=$formatted_dt1->diffInDays($formatted_dt2);

            $leavesTakes +=  $date_diff;
        }
        $leavesTakes;
        $custom_type=[];
        $custom_days=[];

        $leaves_count=Leaves::where('user_id',$user_id)
                            ->where('approve_leave_status','Approved')
                            ->where('period_from','like',$year.'-%')
                            ->get();

        $custom=User_leaves_custom_policy::where('user_id',auth()->user()->id)->get();
        foreach ($custom as $customs) {
            $custom_type[] =$customs->leave_types_id;
            $custom_days[]=$customs->policy_days;
        }
        $leave_setting = Leave_setting::whereNotIn('leave_setting_id', $custom_type)->sum('days');
        $custom_sum=array_sum($custom_days);

        $leave_setting=$custom_sum + $leave_setting;


        $mothYear=Carbon::now()->format('Y-m');

        $overtimeApproved = Overtime::where('user_id',$user_id)->where('overtime_date','like',$mothYear.'%')->where('overtime_status','Approved')->sum('overtime_time');
        $overtimeRemain   = Overtime::where('user_id',$user_id)->where('overtime_date','like',$mothYear.'%')->where('overtime_status','!=','Approved')->sum('overtime_time');

       $loan_as_warrantor = Loan::where('warrantor',auth()->user()->id)->whereIn('status',['Pending','New'])->get();
       $slug = explode(".",$_SERVER['HTTP_HOST'])[0];
       $client = \DB::connection('general')->table('clients')->where('slug',$slug)->first();
        return view('livewire.missing_info',['client'=>$client,'user'=>$user,'nowEmployee'=>$nowEmployee,'activities'=>$activities,'holiday'=>$holiday,'replacements'=>$replacements,'leavesTakes'=>$leavesTakes,'leaves_count'=>$leaves_count,'leave_setting'=>$leave_setting,'overtimeApproved'=>$overtimeApproved,'overtimeRemain'=>$overtimeRemain,'loan_as_warrantor'=>$loan_as_warrantor])->layout('livewire.layouts.base');
    }
}
