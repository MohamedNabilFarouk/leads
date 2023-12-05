<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use DateTime;
use Illuminate\Support\Facades\Validator;
use App\Models\Branch;

class MissingInfoController extends Controller
{
    public function stepOne(Request $request)
    {

// return session()->get('photo');
        $validator = Validator::make($request->all(), [
            'employees_number' => 'required',
            'company_name' => 'required',
            'company_business'=> 'required',
            // 'photo' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['isSuccessed' =>false, 'error'=>$validator->errors()->first()], 200);
        }

        // if($request->has('photo')){
        //     $file_origi_name = $request->photo->getClientOriginalName();
        //     $file_name = time().'-'.$file_origi_name;
        //     $path= public_path('photos/' . $filename);
        //     $photo ->move($path , $file_name );
        // }
        $slug = explode(".",$_SERVER['HTTP_HOST'])[0];

        $client = \DB::connection('general')->table('clients')->where('slug',$slug)->update([
            "photo" => session()->get('photo'),
            "employees_number" => $request->employees_number,
            "company_business" => $request->company_business,
            "company_name" => $request->company_name
         ]);
         session()->forget('photo');

        return response()->json(['isSuccessed' =>true], 200);

    }

    public function stepTwo(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'currency'  => 'required',
            'country' => 'required',
            'business_registration_number'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['isSuccessed' =>false, 'error'=>$validator->errors()->first()], 200);
        }

        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //   CURLOPT_URL => 'https://api.tin-check.com/api.php?tk=2c67f465e6d4f46c7f5b0d31cb850e4f&op=tc&ca=pt&tn='.$this->business_registration_number,
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => '',
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 0,
        //   CURLOPT_FOLLOWLOCATION => true,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => 'GET',
        // ));

        // $response = curl_exec($curl);
        // $json = json_decode($response);

        // if(!$json->valid){
        //     return response()->json(['isSuccessed' =>false,"error"=>"invalid VAT Number"], 200);
        // }

        $slug = explode(".",$_SERVER['HTTP_HOST'])[0];
        $client = \DB::connection('general')->table('clients')->where('slug',$slug)->update([

            "currency" => $request->currency,
            "country" => $request->country,
            "business_registration_number" => $request->business_registration_number
         ]);

         return response()->json(['isSuccessed' =>true], 200);
    }

    public function stepThree(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'lat'  => 'required|numeric',
            'lng' => 'required|numeric',
            'radius'=> 'required|numeric',
            'nfc_id'  => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['isSuccessed' =>false, 'error'=>$validator->errors()->first()], 200);
        }
        $slug = explode(".",$_SERVER['HTTP_HOST'])[0];
        $client = \DB::connection('general')->table('clients')->where('slug',$slug)->update([
            "lat" => $request->lat,
            "lng" => $request->lng,
            "radius" => $request->radius,
            "nfc_id" => $request->nfc_id
         ]);

         $branch = Branch::where("id",1)->first();
         if($branch){
            $branch->lat = $request->lat;
            $branch->lng = $request->lng;
            $branch->radius = $request->radius;
            $branch->nfc_id = $request->nfc_id;
            $branch->save();
         }else{
            Branch::create([
                "title" => "Main Branch",
                "title_ar" => "الفرع الرئيسي",
                "lat" =>  $request->lat,
                "lng" => $request->lng,
                "radius" => $request->radius,
                "nfc_id" => $request->nfc_id,
              
            ]);
         }
         return response()->json(['isSuccessed' =>true], 200);
    }
}


