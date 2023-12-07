<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Project;

use App\Traits\GeneralTrait;
use App\Http\Resources\ClientResource;
use App\Traits\CrudTrait;
use App\Traits\imagesTrait;
use Validator;
use JWTAuth;


class ProjectController extends Controller
{

    use GeneralTrait;
    use CrudTrait;
    use imagesTrait;
    public function __construct()
    {
        $this->getModel(Project::class);
        $this->middleware(['permission:project_read'])->only(['index']);
        $this->middleware(['permission:project_create'])->only(['store']);
        $this->middleware(['permission:project_update'])->only(['update']);
        $this->middleware(['permission:project_delete'])->only(['destroy']);
    }
    public function index()
    {
        // dd(Auth::guard('api')->user());
        // dd(JWTAuth());
       $row = $this->getIndex();
        return $this->generalResponse(200,$row);
    }
    public function store(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
           'title'  => 'required',
            'region' => 'required',
            // 'photo'=> 'image|mimes:jpeg,png,gif,jpg',

        ]);


        // dd(auth::guard('api')->user());
        $data= $request->all();
        if ($request -> has('photo')) {
            $photo = $this -> saveImages($request -> photo, 'images/projects');
            $data['photo'] = $photo;
        }
        $data['created_by'] =auth::guard('api')->user()->id ;

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->toJson()], 400);
        }
        $this->getStore($data);
        return $this->generalResponse(200,'added successfully');
    }

    public function update(Request $request , $id){
        $validator = Validator::make($request->all(), [
            'title'  => 'required',
             'region' => 'required',
             // 'photo'=> 'image|mimes:jpeg,png,gif,jpg',

         ]);

        if($id){
            $data= $request->all();
            if ($request -> has('photo')) {
                $photo = $this -> saveImages($request -> photo, 'images/projects');
                $data['photo'] = $photo;
            }
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



}
