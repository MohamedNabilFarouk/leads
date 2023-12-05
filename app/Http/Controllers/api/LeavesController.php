<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Models\Designations;
use DB;
use Illuminate\Support\Facades\Auth;

class LeavesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    public function myLeaves()
    {
        $user =  Auth::guard('api')->user();

        if (auth()->check() == false) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $leaves = \App\Models\Leaves::with(["replacement","type"])->where('user_id',$user->id)->paginate();

        return response()->json([
            'status' => 200,
            'data' => $leaves
        ]);
    }

    public function leaveTypes()
    {
        $user =  Auth::guard('api')->user();

        if (auth()->check() == false) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $leaveTypes = \App\Models\Leave_type::select("id","name","days")->get();

        return response()->json([
            'status' => 200,
            'data' => $leaveTypes
        ]);
    }

    public function employees(Request $request)
    {
        $user =  Auth::guard('api')->user();

        if (auth()->check() == false) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $users = \App\Models\User::with("job");
        
        if($request->name){
            $users = $users->where("name","like","%".$request->name."%");
        }
        $users = $users->get();

        return response()->json([
            'status' => 200,
            'data' => $users
        ]);
    }

    public function deleteLeave($id)
    {
        $user =  Auth::guard('api')->user();

        if (auth()->check() == false) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $leave = \App\Models\Leaves::where('id',$id)->where('user_id',$user->id)->first();

        if($leave){
            $leave->delete();
            return response()->json([
                'status' => 200,
                'message' => "Successfully deleted"
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'message' => "Not found"
            ]);
        }

    }

    public function getLeave($id)
    {
        $user =  Auth::guard('api')->user();

        if (auth()->check() == false) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $leave = \App\Models\Leaves::where('id',$id)->where('user_id',$user->id)->first();

        return response()->json([
            'status' => 200,
            'data' => $leave
        ]);
    }

    public function createLeave(Request $request)
    {
        $user =  Auth::guard('api')->user();

        if (auth()->check() == false) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $request->merge(["user_id"=>$user->id]);
        $leave = \App\Models\Leaves::create($request->only(["user_id","leave_type_id","leave_reason",
        "employee_replacement","period_from","period_to","work_Resume"]));

        // $fromDate = new DateTime($leave->period_from);

        $fromDate =  \Carbon\Carbon::parse($leave->period_from);

        $dateFrom = $fromDate->format('Y-m-d');

       

        // $toDate = new DateTime($leave->period_to);
        $toDate = \Carbon\Carbon::parse($leave->period_to);

        $dateTo = $toDate->format('Y-m-d');

        $activity= \App\Models\Activites::create([
            'page_name' => 'leaves',
            'link' =>  '/leaves',
            'description' =>$user->name . ' want  to replacement from '.  $dateFrom . ' to ' . $dateTo,
           'description_ar' =>$user->name . ' يريد الاستبدال من '.  $dateFrom . ' إلي ' . $dateTo

       ]);
        \App\Models\ActivityUser::create([
            'activity_id' => $activity->id,
            'send_id'     =>  $user->id,
            'receive_id'  => $leave->employee_replacement
        ]);

        return response()->json([
            'status' => 200,
            'data' => $leave
        ]);

    }

    public function updateLeave($id,Request $request)
    {
        $user =  Auth::guard('api')->user();

        if (auth()->check() == false) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $leave = \App\Models\Leaves::where('id',$id)->where("user_id",$user->id)->first();
        $leave->update($request->only(["user_id","leave_type_id","leave_reason",
        "employee_replacement","period_from","period_to","work_Resume"]));

        $fromDate = new DateTime($leave->period_from);

        $dateFrom = $fromDate->format('d-m-Y');

        $toDate = new DateTime($leave->period_to);

        $dateTo = $toDate->format('d-m-Y');

        $activity= \App\Models\Activites::create([
            'page_name' => 'leaves',
            'link' =>  '/leaves',
            'description' =>$user->name . ' want  to replacement from '.  $dateFrom . ' to ' . $dateTo,
           'description_ar' =>$user->name . ' يريد الاستبدال من '.  $dateFrom . ' إلي ' . $dateTo

       ]);
        \App\Models\ActivityUser::create([
            'activity_id' => $activity->id,
            'send_id'     =>  $user->id,
            'receive_id'  => $leave->employee_replacement
        ]);
        
        return response()->json([
            'status' => 200,
            'data' => $leave
        ]);

    }

    public function approveReplacement($id, Request $request)
    {
        $user =  Auth::guard('api')->user();

        if (auth()->check() == false) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $leave = \App\Models\Leaves::where("replacement_approval",0)->where('id',$id)->where('employee_replacement',$user->id)->first();
        if(!$leave){
            return response()->json(['status' => 400,"message"=>"Not found"], 400);
        }

        $leave->replacement_approval = $request->approval;
        $leave->save();

        return response()->json([
            'status' => 200,
            'message' => "Your approval was successfully updated"
        ]);
    }
}
