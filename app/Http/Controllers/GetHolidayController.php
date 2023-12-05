<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Models\Client as Clients;
use DB;
use Redirect;
class GetHolidayController extends Controller
{

    public function AllHoliday(Request $request){
         
        // $url=request()->getHost();
        // $urlrxplode=explode(".",$url);
       
        // $getclient=DB::connection('general')->table('clients')->where('slug',$urlrxplode[0])->first();
       
        // $apiKey  = '34a1a53a35a24c10912f1f211dfddbd0';
        // $latitude  = $getclient->lat;
        // $longitude = $getclient->lng;
        // $apiUrl = "https://api.opencagedata.com/geocode/v1/json?q={$latitude},{$longitude}&key={$apiKey}&pretty=1";
        // $client = new Client();
        // $response = $client->get($apiUrl);
        // $data = json_decode($response->getBody(), true);
        // $country_code = $data['results'][0]['components']['country_code'];
        // $country=$request->country();
        $country_code=$request->country;
        $date = Carbon::now()->format('y');

        $client = new Client();
        $response = $client->request('GET', 'https://www.googleapis.com/calendar/v3/calendars/en.'.$country_code.'%'.$date.'holiday@group.v.calendar.google.com/events?key=AIzaSyAMvPCHECvAsou0We8DwiF3hUS4adaPcRQ&');

        $holidays = json_decode($response->getBody(), true);
       
        
        foreach($holidays['items'] as $key=>$value){
                
            $holidayCountEn=Holiday::where('title_en',$value['summary'])
                                 ->where('date_from', $value['start']['date'])
                                 ->where('date_to', $value['end']['date'])
                                 ->where('country',$country_code)
                                 ->count();
                            
                                 if($holidayCountEn==0){
            Holiday::create(array(
                'title_en' => $value['summary'],
                'date_from'  => $value['start']['date'],
                'date_to' => $value['end']['date'],
                'country'=>$country_code
            ));

                                 }
        }
            $response1 = $client->request('GET', 'https://www.googleapis.com/calendar/v3/calendars/ar.'.$country_code.'%'.$date.'holiday@group.v.calendar.google.com/events?key=AIzaSyAMvPCHECvAsou0We8DwiF3hUS4adaPcRQ&');
            $holidays1 = json_decode($response1->getBody(), true);
          
            foreach($holidays1['items'] as $key=>$value1){
                $holidayCountAr=Holiday::where('title_ar',$value1['summary'])
                ->where('date_from', $value1['start']['date'])
                ->where('date_to', $value1['end']['date'])
                ->where('country',$country_code)
                ->count();
                if($holidayCountAr==0){
                Holiday::where('date_from',$value1['start']['date'])
                        ->where('date_to',$value1['end']['date'])
                        ->update([
                          'title_ar' => $value1['summary']
                        ]);
                     }
                    }
                        return redirect('/holidays');
        
        
    }
    
    public function AllUserHoliday(){

         $url=request()->getHost();
         $urlrxplode=explode(".",$url);
       
         $getclient=DB::connection('general')->table('clients')->where('slug',$urlrxplode[0])->first();
       if($getclient->lat==''||$getclient->lng==''){
        session()->flash('message', __('Please Add Lat And Long First'));
        return Redirect::back();

       }
         $apiKey  = '34a1a53a35a24c10912f1f211dfddbd0';
         $latitude  = $getclient->lat;
         $longitude = $getclient->lng;
        $apiUrl = "https://api.opencagedata.com/geocode/v1/json?q={$latitude},{$longitude}&key={$apiKey}&pretty=1";
        $client = new Client();
        $response = $client->get($apiUrl);
        $data = json_decode($response->getBody(), true);
        
        $country_code = $data['results'][0]['components']['country_code'];
       
        if($country_code=='sa'){
            $country_code='saudiarabian';
        }
        
            $allHolidays=DB::connection('general')->table('holidays')->where('country',$country_code)->get();

            foreach($allHolidays as $allHoliday)
            {
                $holidayCount=Holiday::where('title_en',$allHoliday->title_en)
                // ->where('title_ar',$allHoliday->title_ar)
                ->where('date_from', $allHoliday->date_from)
                ->where('date_to', $allHoliday->date_to)
                ->count();
                if($holidayCount==0){

                Holiday::create(array(
                    'title_en' => $allHoliday->title_en,
                    'title_ar' => $allHoliday->title_ar,
                    'date_from'  => $allHoliday->date_from,
                    'date_to' => $allHoliday->date_to
                ));
            }
            }
            session()->flash('message', __('added successfully'));
            return redirect('/holidays');
        }

       

    public function getHolidaysByCountry()
    {

        $client = new Client();
        $response = $client->request('GET', 'https://calendarific.com/api/v2/holidays', [
            'query' => [
                'api_key' => '1ae787ff1168ee426a26d571d1856556f921a7bb',
                'country' => 'ar.eg',
                'year' => 23,
                'start_date' => '01-01-2023',
                'end_date' => '31-12-2023',
            ],
        ]);
        $holidays = json_decode($response->getBody(), true);
        return response()->json($holidays);
    }

}
