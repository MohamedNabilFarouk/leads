<?php

namespace App\Http\Livewire;

use App\Models\Feature;
use App\Models\ContactUs;
use App\Models\Contact;
use App\Models\Layout;
use DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;

class LayoutComponent extends Component
{
    use WithFileUploads;

    public $image_one,$title_en_one,$title_ar_one,$description_en_one,$description_ar_one,$button_name_en_one,$button_name_ar_one,$link_one,$second_button_name_en_one,$second_button_name_ar_one,$second_link_one,$active_one,
           $title_en_two,$title_ar_two,$active_two,
           $title_en_three,$title_ar_three,$description_en_three,$description_ar_three,$active_three,
           $image_four,$title_en_four,$title_ar_four,$description_en_four,$description_ar_four,$active_four,
           $image_five,$title_en_five,$title_ar_five,$description_en_five,$description_ar_five,$active_five,
           $image_six,$title_en_six,$title_ar_six,$description_en_six,$description_ar_six,$button_name_en_six,$button_name_ar_six,$link_six,$active_six,
           $icon,$feature_title_en,$feature_title_ar,$feature_description_en,$feature_description_ar,$feature_edit_id,$feature_delete_id,
           $show,$photo,
           $contact_title_ar,$contact_title_en,$contact_address_ar,$contact_address_en,$contact_phone,$contact_email,$contact_map,$country1_en,$country1_ar,
           $country2_en,$country2_ar ,$contact_address2_ar,$contact_address2_en;
    //section one
    public function mount(){
        //section one
        $section_one                = Layout::where('id',1)->first();
        $this->title_en_one         = $section_one->title_en;
        $this->title_ar_one         = $section_one->title_ar;
        $this->description_en_one   = $section_one->description_en;
        $this->description_ar_one   = $section_one->description_ar;
        $this->button_name_en_one   = $section_one->button_en;
        $this->button_name_ar_one   = $section_one->button_ar;
        $this->link_one             = $section_one->link;
        $this->second_button_name_en_one = $section_one->second_button_en;
        $this->second_button_name_ar_one = $section_one->second_button_ar;
        $this->second_link_one = $section_one->second_link;
        $this->active_one           = $section_one->active;
        $this->image_one            = $section_one->image;
        //section_two
        $section_two                = Layout::where('id',2)->first();
        $this->title_en_two         = $section_two->title_en;
        $this->title_ar_two         = $section_two->title_ar;
        $this->active_two           = $section_two->active;
        //section three
        $section_three              = Layout::where('id',3)->first();
        $this->title_en_three       = $section_three->title_en;
        $this->title_ar_three       = $section_three->title_ar;
        $this->description_en_three = $section_three->description_en;
        $this->description_ar_three = $section_three->description_ar;
        $this->active_three         = $section_three->active;
        //section four
        $section_four                = Layout::where('id',4)->first();
        $this->title_en_four         = $section_four->title_en;
        $this->title_ar_four         = $section_four->title_ar;
        $this->description_en_four   = $section_four->description_en;
        $this->description_ar_four   = $section_four->description_ar;
        $this->active_four            = $section_four->active;
        //section five
        $section_five                = Layout::where('id',5)->first();
        $this->title_en_five         = $section_five->title_en;
        $this->title_ar_five         = $section_five->title_ar;
        $this->description_en_five   = $section_five->description_en;
        $this->description_ar_five   = $section_five->description_ar;
        $this->active_five           = $section_five->active;
        //section six
        $section_six                 = Layout::where('id',6)->first();
        $this->title_en_six          = $section_six->title_en;
        $this->title_ar_six          = $section_six->title_ar;
        $this->description_en_six    = $section_six->description_en;
        $this->description_ar_six    = $section_six->description_ar;
        $this->button_name_en_six    = $section_six->button_en;
        $this->button_name_ar_six    = $section_six->button_ar;
        $this->description_ar_six    = $section_six->description_ar;
        $this->active_six            = $section_six->active;
        $this->link_six            = $section_six->link;
        //About
        $about                      = Layout::where('id',7)->first();
        $this->about_title_en       = $about->title_en;
        $this->about_title_ar       = $about->title_ar;
        $this->show                  = 'section_one';
        // contact us
            $contactus = ContactUs::first();
        $this->contact_phone        =  $contactus->contact_phone       ;
        $this->contact_email        = $contactus->contact_email;
        $this->contact_map          = $contactus->contact_map;
        $this->contact_title_en     = $contactus->contact_title_en;
        $this->contact_title_ar     = $contactus->contact_title_ar;
        $this->contact_address_en   = $contactus->contact_address_en;
        $this->contact_address_ar    = $contactus->contact_address_ar;
        $this->contact_address2_en   = $contactus->contact_address2_en;
        $this->contact_address2_ar    = $contactus->contact_address2_ar;
        $this->country1_en            = $contactus->country1_en        ;
        $this->country1_ar            = $contactus->country1_ar        ;
        $this->country2_en            = $contactus->country2_en        ;
        $this->country2_ar            = $contactus->country2_ar        ;



    }

    public function toggle($sectionName)
    {
        $this->show = $sectionName;

    }
    public function storeSectionOneData(){
        $this->validate([
            'title_en_one'              => 'required|max:255',
            'title_ar_one'             => 'required|max:255'
        ]);
        $section_one                    = Layout::where('id',1)->first();
        $section_one->title_en          = $this->title_en_one;
        $section_one->title_ar          = $this->title_ar_one;
        $section_one->description_en    = $this->description_en_one;
        $section_one->description_ar    = $this->description_ar_one;
        $section_one->button_en         = $this->button_name_en_one;
        $section_one->button_ar         = $this->button_name_ar_one;
        $section_one->link              = $this->link_one;
        $section_one->second_button_en  = $this->second_button_name_en_one;
        $section_one->second_button_ar  = $this->second_button_name_ar_one;
        $section_one->second_link       = $this->second_link_one;
        $section_one->active            = $this->active_one;
        $section_one->save();

    }

    public function storeSectionTwoData(){
        $this->validate([
            'title_en_two'              => 'required|max:255',
            'title_ar_two'             => 'required|max:255'
        ]);
        $section_two                    = Layout::where('id',2)->first();
        $section_two->title_en          = $this->title_en_two;
        $section_two->title_ar          = $this->title_ar_two;
        $section_two->active            = $this->active_two;
        $section_two->save();

    }
    public function storeSectionThreeData(){
        $this->validate([
            'title_en_three'              => 'required|max:255',
            'title_ar_three'             => 'required|max:255'
        ]);
        $section_three                  = Layout::where('id',3)->first();
        $section_three->title_en        = $this->title_en_three;
        $section_three->title_ar        = $this->title_ar_three;
        $section_three->description_en  = $this->description_en_three;
        $section_three->description_ar  = $this->description_ar_three;
        $section_three->active          = $this->active_three;
        $section_three->save();

    }

    public function storeSectionFourData(){
        $this->validate([
            'title_en_four'              => 'required|max:255',
            'title_ar_four'             => 'required|max:255'
        ]);
        $section_four                   = Layout::where('id',4)->first();
        $section_four->title_en          = $this->title_en_four;
        $section_four->title_ar          = $this->title_ar_four;
        $section_four->description_en    = $this->description_en_four;
        $section_four->description_ar    = $this->description_ar_four;
        $section_four->active            = $this->active_four;
        $section_four->save();

    }
    public function storeSectionFiveData(){
        $this->validate([
            'title_en_five'              => 'required|max:255',
            'title_ar_five'             => 'required|max:255'
        ]);
        $section_five                    = Layout::where('id',5)->first();
        $section_five->title_en          = $this->title_en_five;
        $section_five->title_ar          = $this->title_ar_five;
        $section_five->description_en    = $this->description_en_five;
        $section_five->description_ar    = $this->description_ar_five;
        $section_five->active            = $this->active_five;
        $section_five->save();

    }

    public function storeSectionSixData(){
        $this->validate([
            'title_en_six'              => 'required|max:255',
            'title_ar_six'             => 'required|max:255'
        ]);
        $section_six                    = Layout::where('id',6)->first();
        $section_six->title_en          = $this->title_en_six;
        $section_six->title_ar          = $this->title_ar_six;
        $section_six->description_en    = $this->description_en_six;
        $section_six->description_ar    = $this->description_ar_six;
        $section_six->button_en         = $this->button_name_en_six;
        $section_six->button_ar         = $this->button_name_ar_six;
        $section_six->link              = $this->link_six;
        $section_six->active            = $this->active_six;
        $section_six->save();

    }



    public function contactStore(){
        // dd('1');
        // $contact = new ContactUs();
        $contact = ContactUs::where('id',2)->first();
        $contact->contact_phone            =    $this->contact_phone;
        $contact->contact_email           =     $this->contact_email;
        $contact->contact_map         =         $this->contact_map;
        $contact->contact_title_en        =     $this->contact_title_en;
        $contact->contact_title_ar        =     $this->contact_title_ar;
        $contact->contact_address_en  =         $this->contact_address_en;
        $contact->contact_address_ar  =         $this->contact_address_ar;
        $contact->contact_address2_en  =         $this->contact_address2_en;
        $contact->contact_address2_ar  =         $this->contact_address2_ar;
        $contact->country1_en           =         $this->country1_en;
        $contact->country1_ar           =         $this->country1_ar;
        $contact->country2_en           =         $this->country2_en;
        $contact->country2_ar           =         $this->country2_ar;

        $contact->save();
        $contact->save();
        $contact->save();
        session()->flash('message', __('Updated successfully'));
        return redirect()->back();

        $this->contact_phone = '';

        $this->contact_email     ='';
        $this->contact_map       =''  ;
        $this->contact_phone      =''  ;
        $this->contact_title_en  =''  ;
        $this->contact_title_ar  =''  ;
        $this->contact_address_en=''   ;
        $this->contact_address_ar=''   ;
    }


    public function storeFeatureData(Request $request)
    {
        // //on form submit validation
        // $this->validate([
        //     'name'  => 'required',
        //     'name_ar'=>'required'
        // ]);

        //Add Feature Data
        $feature = new Feature();
        $feature->icon            = $this->icon;
        $feature->title_en        = $this->feature_title_en;
        $feature->title_ar        = $this->feature_title_ar;
        $feature->description_en  = $this->feature_description_en;
        $feature->description_ar  = $this->feature_description_ar;
        if($this->show=='section_two') {
            $feature->section_no = 2;
        }elseif($this->show=='section_three'){
            $feature->section_no = 3;

        }

        $feature->save();

        session()->flash('message', __('added successfully'));


        $this->icon                   ='';
        $this->feature_title_en       ='';
        $this->feature_title_ar       ='';
        $this->feature_description_en ='';
        $this->feature_description_ar ='';


        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function storeAboutSection(){
        $about                    = Layout::where('id',7)->first();
        $about->title_en          = $this->about_title_en;
        $about->title_ar          = $this->about_title_ar;
        $about->save();

    }

    public function editFeature($id)
    {
        $feature =  Feature::where('id', $id)->first();
        $this->feature_edit_id        = $feature->id;
        $this->icon                   = $feature->icon;
        $this->feature_title_en       = $feature->title_en;
        $this->feature_title_ar       = $feature->title_ar;
        $this->feature_description_en = $feature->description_en;
        $this->feature_description_ar = $feature->description_ar;

        $this->dispatchBrowserEvent('show-edit-feature-modal');
    }

    public function editFeatureData()
    {
        //on form submit validation
        // $this->validate([
        //     'name'  => 'required|string',
        //     'name_ar'  => 'required|string'

        // ]);

        $feature = Feature::where('id', $this->feature_edit_id)->first();
        $feature->icon               = $this->icon;
        $feature->title_en           = $this->feature_title_en;
        $feature->title_ar           = $this->feature_title_ar;
        $feature->description_en     = $this->feature_description_en;
        $feature->description_ar     = $this->feature_description_ar;


        $feature->save();

        session()->flash('message', __('updated successfully'));
        $this->feature_edit_id        ='';
        $this->icon                   ='';
        $this->feature_title_en       ='';
        $this->feature_title_ar       ='';
        $this->feature_description_en ='';
        $this->feature_description_ar ='';

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {

        $this->feature_delete_id = $id; //student id

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deleteFeatureData()
    {

        $feature = Feature::where('id', $this->feature_delete_id)->first();
        $feature->delete();

        session()->flash('message', __('deleted successfully'));

        $this->dispatchBrowserEvent('close-modal');

        $this->dfeature_delete_id = '';
    }

    public function cancel()
    {
        $this->feature_delete_id = '';
    }
    public function close()
    {

    }

    public function render()
    {
        $features      = Feature::where('section_no',2)->get();
        $featureTitles = Feature::where('section_no',3)->get();




        $messages = Contact::orderBy('id','DESC')->get();



        return view('livewire.layout-component',['features'=>$features,'featureTitles'=>$featureTitles,
        'messages' => $messages,])->layout('livewire.layouts.base');
    }

}
