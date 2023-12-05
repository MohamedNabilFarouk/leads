<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Channel;
use App\Traits\GeneralTrait;
use App\Traits\CrudTrait;

use Validator;
class ChannelController extends Controller
{
    use GeneralTrait;
    use CrudTrait;

    public function __construct()
    {
        $this->getModel(Channel::class);
    }
    public function index()
    {

       $row = $this->getIndex();
        return $this->generalResponse(200,$row);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_en'  => 'required',
            'title_ar' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->toJson()], 400);
        }
        $data= $request->all();
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
}
