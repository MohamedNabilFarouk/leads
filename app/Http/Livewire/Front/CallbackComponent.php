<?php

namespace App\Http\Livewire\Front;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Client;
use Spatie\Multitenancy\Models\Tenant;
use Auth;
use DB;
use Carbon\Carbon;
class CallbackComponent extends Component
{
    public function render(Request $request)
    {
        //  dd($request->order);
        $subscribtion = DB::connection('general')->table('user_subscribers')->where('order_id',$request->order)->first();
// dd($subscribtion);
if($request->success == 'true'){


DB::connection('general')->table('user_subscribers')->select('id')->where('id',$subscribtion->id)->update([
    'is_paid'         => 1,
    'trans_id'         => $request->id,
    "payment_status"=>$request->data_message
]);
// session()->flash('message', __('Your Plan Subscribed Successfully'));
}


        $client=Client::where('id',$subscribtion->client_id)->first();
        $client->active = 1;
        $client->save();

        $t=Tenant::where('domain',$client->slug.'.'.request()->getHttpHost())->first();
        $t->makeCurrent();
// permissions seed
        Artisan::call('db:seed', ['--class' => 'PermissionSeeder']);
        Artisan::call('db:seed', ['--class' => 'ModelPermissionSeeder']);
        Artisan::call('db:seed', ['--class' => 'RolePermissionSeeder']);
// permission seed end



        // $this->redirect('https://'.$t->domain.'/client-dashboard');

        return view('livewire.front.callback-component')->layout('livewire.layouts.front');
    }
}
