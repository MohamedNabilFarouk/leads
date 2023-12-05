<?php

namespace App\Http\Livewire;

use App\Models\Holiday;
use App\Models\ModelHasPermission;
use App\Models\Module;
use App\Models\Permission;
use App\Models\SubscriptionPlan;
use App\Models\UserSubscriber;
use Livewire\Component;
use Carbon\Carbon;
class SubscriptionPlanComponent extends Component
{

    public $name_en,$name_ar,$currency,$frequency,$price,$trail_days,$subscriptionPlan_edit_id, $subscriptionPlan_delete_id;
    public $module_plan=[];

    public $frequencies = [
            'Month',
            'Year'
        ];

    //Input fields on update validation
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name_en'       => 'required',
            'name_ar'       => 'required',
            'currency'   => 'required',
            'price'      => 'required',
            'frequency'  => 'required',
            'trail_days' => 'required'
        ]);
    }


    public function storeSubscriptionPlanModalData()
    {
        //on form submit validation
        $this->validate([
            'name_en'       => 'required',
            'name_ar'       => 'required',
            'currency'   => 'required',
            'price'      => 'required',
            'frequency'  => 'required',
            'trail_days' => 'required'
        ]);


            //Add Student Data
        $subscriptionPlan = new SubscriptionPlan();
        $subscriptionPlan->name_en          = $this->name_en;
        $subscriptionPlan->name_ar          = $this->name_ar;
        $subscriptionPlan->currency      = $this->currency;
        $subscriptionPlan->price         = $this->price;
        $subscriptionPlan->frequency     = $this->frequency;
        $subscriptionPlan->trail_days    = $this->trail_days;
        $subscriptionPlan->permission_id = json_encode($this->module_plan);
        $subscriptionPlan->save();

        session()->flash('message', __('added successfully'));

        $this->name = '';
        $this->currency = '';
        $this->frequency = '';
        $this->price = '';
        $this->trail_days = '';
        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->name = '';
        $this->currency = '';
        $this->frequency = '';
        $this->price = '';
        $this->trail_days = '';
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function editSubscriptionPlan($id)
    {
        $subscriptionPlan = SubscriptionPlan::where('id', $id)->first();
        $this->subscriptionPlan_edit_id = $subscriptionPlan->id;
        $this->name_en = $subscriptionPlan->name_en;
        $this->name_ar = $subscriptionPlan->name_ar;
        $this->currency = $subscriptionPlan->currency;
        $this->price = $subscriptionPlan->price;
        $this->frequency = $subscriptionPlan->frequency;
        $this->trail_days = $subscriptionPlan->trail_days;
        $this->module_plan = json_decode($subscriptionPlan->permission_id);
        $this->dispatchBrowserEvent('show-edit-subscriptionPlan-modal');
    }

    public function editSubscriptionPlanData()
    {
        //on form submit validation
        $this->validate([
            'name_en'      => 'required',
            'name_ar'      => 'required',
            'currency'  => 'required',
            'price'     => 'required',
            'frequency' => 'required',
            'trail_days' => 'required'
        ]);

        $subscriptionPlan = SubscriptionPlan::where('id', $this->subscriptionPlan_edit_id)->first();
        $subscriptionPlan->name_en       = $this->name_en;
        $subscriptionPlan->name_ar       = $this->name_ar;
        $subscriptionPlan->currency   = $this->currency;
        $subscriptionPlan->price      = $this->price;
        $subscriptionPlan->frequency  = $this->frequency;
        $subscriptionPlan->trail_days = $this->trail_days;
        $subscriptionPlan->permission_id = json_encode($this->module_plan);
        $subscriptionPlan->save();

        session()->flash('message', __('updated successfully'));

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->subscriptionPlan_delete_id = $id; 
        $UserSubscriber = UserSubscriber::where([['plan_id',  $id],['end_date','>',Carbon::now()],['is_paid','1']])->exists();
        if ($UserSubscriber) {
            session()->flash('error', __('This Plan is Used so cannot be deleted'));
        }else{
            $this->dispatchBrowserEvent('show-delete-confirmation-modal');
        }
    }

    public function deleteSubscriptionPlanData()
    {

        $subscriptionPlan = SubscriptionPlan::where('id', $this->subscriptionPlan_delete_id)->first();


        $UserSubscriber = UserSubscriber::where([['plan_id',  $this->subscriptionPlan_delete_id],['end_date','>',Carbon::now()],['is_paid','1']])->exists();
        
        // dd($UserSubscriber);
        if ($UserSubscriber) {
            session()->flash('error', __('This Plan is Used so cannot be deleted'));
        }else{
            $subscriptionPlan->delete();

        session()->flash('message', __('deleted successfully'));

        $this->dispatchBrowserEvent('close-modal');

        $this->subscriptionPlan_delete_id = '';

        }

           }

    public function cancel()
    {
        $this->subscriptionPlan_delete_id = '';
    }


    public function render()
    {
        //Get all students
        $subscription_plans = SubscriptionPlan::all();
        // Absence::where([['user_id',(int)$employee->employee_id],['date','like',$payrollDateYear.'-'."$payrollDateMonth".'-%']]
        $modules=Module::all();
        // dd($modules);
        return view('livewire.subscription-plan-component',['subscription_plans'=>$subscription_plans,'modules'=>$modules])->layout('livewire.layouts.base');
    }
}

