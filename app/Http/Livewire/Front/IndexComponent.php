<?php

namespace App\Http\Livewire\Front;

use App\Models\DemoRequest;
use App\Models\Feature;
use App\Models\Layout;
use Livewire\Component;
use App\Models\Contact;
use App\Models\User;
use App\Models\ActivityUser;
use App\Models\Activites;

class IndexComponent extends Component
{
    public $name,$company_name,$phone;
    public function demoRequest(){
        $validatedData = $this->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'company_name' => 'required',
        ]);


        // Contact::create($validatedData);

        $contact=new Contact;
        $contact->name                     = ($this->name   == "" ? NULL : $this->name);
        $contact->phone                     = ($this->phone   == "" ? NULL  : $this->phone);
        $contact->subject                 = ($this->company_name   == "" ? NULL  : $this->company_name);
        $contact->message                 = 'Ask For Demo';
     
    
        $contact->save();

        $notifi_users=[];
        $notifi_users = User::all();
        // dd($notifi_users);
        $activity = Activites::create([
            'page_name' => 'Ask For Demo',
            'link' => 'layouts',
            'description' => 'Ask For Demo',
            'description_ar' => 'اطلب عرضًا',

        ]);

        foreach ($notifi_users as $notifi_user) {

            ActivityUser::create([
                'activity_id' => $activity->id,
                'send_id'     => 0,
                'receive_id'  => $notifi_user->id
            ]);
        }


        $this->name='';
        $this->phone='';
        $this->company_name='';

        session()->flash('message', __('Send Successfully'));

//        return redirect()->to('/index#demo');
    }
    public function render()
    {
        $section_one   = Layout::where('id',1)->first();
        $section_two   = Layout::where('id',2)->first();
        $services      = Feature::where('section_no',2)->get();
        $section_three = Layout::where('id',3)->first();
        $section_four  = Layout::where('id',4)->first();
        $section_five  = Layout::where('id',5)->first();
        $section_six   = Layout::where('id',6)->first();
        $features      = Feature::where('section_no',3)->get();

        return view('livewire.front.index-component',['section_one'=>$section_one,'section_two'=>$section_two,'services'=>$services,'section_three'=>$section_three,'section_four'=>$section_four,'section_five'=>$section_five,'section_six'=>$section_six,'features'=>$features])->layout('livewire.layouts.front');
    }
}
