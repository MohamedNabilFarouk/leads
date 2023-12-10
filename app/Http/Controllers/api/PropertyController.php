<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Property;

use App\Traits\GeneralTrait;
use App\Http\Resources\ClientResource;
use App\Traits\CrudTrait;
use App\Traits\imagesTrait;
use Validator;
use App\Models\PropertyGallery;
class PropertyController extends Controller
{
    use GeneralTrait;
    use CrudTrait;
    use imagesTrait;
    public function __construct()
    {
        $this->getModel(Property::class);
    }
    public function index()
    {

       $row = $this->getIndex();
        return $this->generalResponse(200,$row);
    }

    public function store(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'region'       => 'required',
            'land_space'   => 'required',
            'price'        => 'required',
            'owner'        => 'required',
            'owner_mobile' => 'required',
            'category'     => 'required',
            'unit_type'    => 'required',
            'department'   => 'required',
            // "pdf"          => "mimes:pdf|max:10000"


        ]);


        // dd(auth::guard('api')->user());
        $data= $request->all();
       
    
        if ($request -> has('pdf')) {
            $pdf = $this -> saveImages($request -> pdf, 'images/properties/pdf');
            $data['pdf'] = $pdf;
        }
        // $data['created_by'] =auth::guard('api')->user()->id ;

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->toJson()], 400);
        }
        $getId=$this->getStore($data);
        
        if($request->gallery!=''){
        foreach($request->gallery as $g){
            $gallery = new PropertyGallery();
            $image = $this -> saveImages($g, 'images/properties/gallery');
            $gallery->image = $image;
            $gallery->property_id = $getId->id;
            $gallery->save();
        }
    }

        return $this->generalResponse(200,'added successfully');
    }

    public function update(Request $request , $id){
        $validator = Validator::make($request->all(), [
            'region'       => 'required',
            'land_space'   => 'required',
            'price'        => 'required',
            'owner'        => 'required',
            'owner_mobile' => 'required',
            'category'     => 'required',
            'unit_type'    => 'required',
            'department'   => 'required',
             // 'photo'=> 'image|mimes:jpeg,png,gif,jpg',

         ]);

        if($id){
            $data= $request->all();
            if ($request -> has('pdf')) {
                $pdf = $this -> saveImages($request -> pdf, 'images/properties/pdf');
                $data['pdf'] = $pdf;
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