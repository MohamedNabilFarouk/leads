<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Traits\GeneralTrait;
use App\Traits\CrudTrait;

use Validator;
class RegionController extends Controller
{
    use GeneralTrait;
    use CrudTrait;

    public function __construct()
    {

        $this->getModel(Region::class);
    }
    public function index()
    {

       $row = $this->getIndex();
        return $this->generalResponse(200,$row);
    }
    public function store(Request $request)
    {
        //on form submit validation
        $validator = Validator::make($request->all(), [
            'title_en'  => 'required',
            'title_ar' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->toJson()], 400);
        }
        $data= $request->all();
    //    Region::create($request->all());
        $this->getStore($data);
        return $this->generalResponse(200,'added successfully');
    }

    public function update(Request $request , $id){

        if($id){
            // $row = Region::findOrFail($id);
            // $row->update($request->all());
            $data= $request->all();
            $this->getUpdate($data,$id);
        return $this->generalResponse(200,'updated successfully');
        }
    }

    public function destroy($id){
        if($id){
            //  Region::findOrFail($id)->delete();
            $this->getDestroy($id);
            return $this->generalResponse(200,'deleted successfully');
        }
        return $this->generalResponse(400,'There is no Region');
    }
}
