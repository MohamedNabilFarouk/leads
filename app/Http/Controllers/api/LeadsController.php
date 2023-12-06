<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Lead;
use App\Models\LeadStatus;
use App\Models\Client;
use App\Http\Resources\UserResource;
use Spatie\Multitenancy\Models\Tenant;
use App\Traits\GeneralTrait;
use App\Http\Resources\ClientResource;
use App\Traits\CrudTrait;
use Carbon\Carbon;
use Validator;

use Tymon\JWTAuth\Facades\JWTAuth;

class LeadsController extends Controller
{

    use GeneralTrait;
    use CrudTrait;
    public function __construct()
    {
        $this->getModel(Lead::class);
    }

    public function store(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
           'name'  => 'required',
            'email' => 'email',
            'phone'=> 'required|unique:leads',
            'marketer_id'=> 'required',
            'sales_id'=> 'required',
            'note'=>'required',
        ]);
        // dd(auth::guard('api')->user());
        $data= $request->all();
        $data['created_by'] =auth::guard('api')->user()->id ;

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->toJson()], 400);
        }
        $this->getStore($data);
        return $this->generalResponse(200,'added successfully');
    }

    public function update(Request $request , $id){

        if($id){
            $data= $request->all();
            $this->getUpdate($data,$id);
        return $this->generalResponse(200,'updated successfully');
        }
    }

    public function destroy($id){
        if($id){
            $this->getDestroy($id);
            return $this->generalResponse(200,'deleted successfully');
        }
        return $this->generalResponse(400,'There is no Region');
    }

            public function filter(Request $request){
                $query = Lead::query();

                if($request->name){
                    $query->where('name','like','%'.$request->name.'%');
                }
                if($request->phone){
                    $query->where('phone','like','%'.$request->phone.'%');
                }
                if($request->status){
                    $query->where('status',$request->status);
                }
                if($request->sales){
                    $query->where('sales_id',$request->sales);
                }
                if($request->marketer){
                    $query->where('marketer_id',$request->marketer);
                }
                if($request->project){
                    $query->where('project_id',$request->project);
                }
                if($request->budget){
                    $query->where('budget',$request->budget);
                }
                if($request->channel){
                    $query->where('channel',$request->channel);
                }
                if($request->region){
                    $query->whereHas('Project',function($q)use($request){
                        $q->where('region',$request->region);
                    });
                }
                if($request->communication_way){
                    $query->where('communication_way','like','%'.$request->communication_way.'%');
                }
                if($request->cancel_reason){
                    $query->where('cancel_reason','like','%'.$request->cancel_reason.'%');
                    }
                if($request->note){
                    $query->where('note','like','%'.$request->note.'%');
                }
                if($request->created_from){
                    // dd($this->search_from);
                    $query->whereBetween('created_at', [$request->created_from, $request->created_to ?? Carbon::today()]);
                }
                if($request->action_date_from){
                    // dd($this->search_from);
                    $query->whereBetween('action_date', [$request->action_date_from, $request->action_date_to ?? Carbon::today()]);
                }


            $data = $query->get();
            return $this->generalResponse(200,$data);
            }

// not used
    public function getLeadsByStatus(Request $request){
        // dd('here');
        // $statuses = [
        //     'New',
        //     'No Answer',
        //     'Meeting',
        //     'Following after meeting',
        //     'Reschedule meeting',
        //     'Following',
        //     'Cancellation',
        //     'Done deal',
        //     'Archive',
        //     'Reservation'
        // ];

        // $statuses = LeadStatus::all();
if($request->has('status')){
        $data =Lead::where('status',$request->status)->orderBy('id','DESC')->get();
}else{
    $data =Lead::orderBy('id','DESC')->get();
}


        return $this->generalResponse(200,$data);


    }



}
