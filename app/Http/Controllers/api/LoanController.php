<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Models\Designations;
use App\Models\Loan;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class LoanController extends Controller
{

    use GeneralTrait;
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }


    public function getUserLoans($user_id){
        $userLoans = Loan::where('user_id',$user_id)->with('warrantors')->get();
// dd($userLoans);
        return response()->json([
            'status' => 200,
            'data' => $userLoans
        ]);
    }

    public function getWarrantorLoans($user_id){
        $userLoans = Loan::where('warrantor',$user_id)->with('user')->whereIn('status',['Pending','New'])->get();
// dd($userLoans);
        return response()->json([
            'status' => 200,
            'data' => $userLoans
        ]);
    }

    public function addLoan(Request $request){
        $validator = Validator::make($request->all(), [

            'amount'        => 'required|numeric',
            'payment_method'        => 'required',
            'payment_period'         => 'numeric|nullable',
            // 'payment_date'         => 'date',
            'warrantor'                  => 'required',
        ]);
        if ($validator->fails()) {
            // dd($validator->errors()->first());
            // dd('here');
            return response()->json(['status'=>400, 'message'=>$validator->errors()->first()]);

        } else {
        $loan = new Loan();
        //Add Leave Data
        $loan->user_id                           = $request->user_id;
        $loan->loan_explication                   = $request->amount;
        $loan->payment_period              = $request->payment_period;
        $loan->payment_method              = $request->payment_method;
        $loan->payment_date              = $request->payment_date;
        $loan->warrantor                     = $request->warrantor;
        $loan->status                     = 'New';
        $loan->save()   ;
        $user =  Auth::guard('api')->user();


        $activity = \App\Models\Activites::create([
            'page_name' => 'Loan',
            'link' => '/loan',
            'description' => $user->name . ' add Loan request',
            'description_ar' =>$user->name . ' طلب سلفة'

        ]);
        // $notifi_users =  \App\Models\User::role(['supervisor'])->orWhere('id',$loan->warrantor)->get();


        $notifi_users = User::whereHas('userrole',function($q){
            $q->whereIn("name", ['supervisor']);
        })->orWhere('id',$request->warrantor)->get();


        foreach ($notifi_users as $notifi_user) {

            \App\Models\ActivityUser::create([
                'activity_id' => $activity->id,
                'send_id'     => $user->id,
                'receive_id'  => $notifi_user->id
            ]);
        }
        return response()->json(['status'=>200, 'message'=>'Added successfully']);

    }
}
public function changeStatus(Request $request){


     $status = [
                    'New',
                    'Pending',
                    'warrantor_Approved',
                    'warrantor_Declined',
                    'hr_Approved',
                    'hr_Declined',
                    'finance_Approved',
                    'finance_Declined',
                    'Approved',
                    'Declined',
     ];



    if(!in_array($request->status, $status)){
        return response()->json(['status'=>400, 'message'=>'Status Not Found']);
    }else{

    $loan = Loan::findOrFail($request->loan_id);
    $loan->status = $request->status;
    $loan->save();

    $user =  Auth::guard('api')->user();

    $notifi_users =  \App\Models\User::role(['supervisor'])->orWhere('id',$loan->warrantor)->get();

    $activity =  \App\Models\Activites::create([
        'page_name' => 'Loan',
        'link' => '/loan',
        'description' => $user->name . ' Upadate Loan request to  '. $request->status,
        'description_ar' =>$user->name . '  حدث حالة السلفة الي ' .__($request->status)

    ]);

    foreach ($notifi_users as $notifi_user) {

        \App\Models\ActivityUser::create([
            'activity_id' => $activity->id,
            'send_id'     => $user->id,
            'receive_id'  => $notifi_user->id
        ]);
    }
    return response()->json(['status'=>200, 'message'=>'Updated successfully']);
    }


}


    }


