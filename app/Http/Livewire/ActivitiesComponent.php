<?php

namespace App\Http\Livewire;

use App\Models\Activites;
use App\Models\ActivityUser;
use Livewire\Component;
use DB;
class ActivitiesComponent extends Component
{
    public function render()
    {
        $activities =  DB::connection('tenant')->table('activity_users')
        ->join('activites','activity_users.activity_id','activites.id')
        ->join('users','activity_users.send_id','users.id')
        ->where('activity_users.receive_id',auth()->user()->id)
        ->where('activity_users.status','0')
        ->orderby('activity_users.id','desc')
        ->get();
        return view('livewire.activities-component',['activities'=>$activities])->layout('livewire.layouts.base');
    }

    public function ClearAll(){
        // dd('here');
      $rows=  ActivityUser::where([['receive_id',auth()->user()->id],['status','0']])->update(['status' => '1']);

      return response() -> json(['data' => 'success']);
    }
    public function ClearOne($noti_id){
        //  dd('here');
      $rows=  ActivityUser::where([['id',$noti_id]])->with('activity')->first();
    //   dd($rows->activity->link);
      $rows->update(['status' => '1']);

      return  redirect($rows->activity->link);

    }
}
