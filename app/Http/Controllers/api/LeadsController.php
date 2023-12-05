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
                if($this->search_from){
                    // dd($this->search_from);
                    $query->whereBetween('created_at', [$this->search_from.' 00:00:00', $this->search_to.' 23:59:59']);
                }


            $data = $query->get();
            }

// not used
    public function getLeadsByStatus($status){
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

        $data =Lead::where('status',$status)->orderBy('id','DESC')->get();



        return $this->generalResponse(200,$data);


    }



}
