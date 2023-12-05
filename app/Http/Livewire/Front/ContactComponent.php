<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Contact;
use App\Models\User;
use App\Models\ActivityUser;
use App\Models\Activites;
use App\Models\ContactUs;
class ContactComponent extends Component
{
    public $name,$email,$subject,$message;
    public function contact()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Contact::create($validatedData);



        $notifi_users=[];
        $notifi_users = User::all();
        // dd($notifi_users);
        $activity = Activites::create([
            'page_name' => 'Contact Message',
            'link' => 'layouts',
            'description' => 'New Contact Message',
            'description_ar' => 'لديك رسالة جديدة',

        ]);

        foreach ($notifi_users as $notifi_user) {

            ActivityUser::create([
                'activity_id' => $activity->id,
                'send_id'     => 0,
                'receive_id'  => $notifi_user->id
            ]);
        }


        $details = [
            'title' => 'Contact',
            'body' => $this->message,
            'subject'=>$this->subject
        ];

        // Mail::to($this->email)->send(new ExampleMail($details));


        $this->name = '';
        $this->email = '';
        $this->subject = '';
        $this->message = '';

        session()->flash('message', __('Send Successfully'));
    }
    public function render()
    {
$contact_us =  ContactUs::first();
        return view('livewire.front.contact-component',compact('contact_us'))->layout('livewire.layouts.front');
    }
}
