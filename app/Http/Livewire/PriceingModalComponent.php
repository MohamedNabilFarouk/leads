<?php
namespace App\Http\Livewire;
use App\Models\Attendance;
use Livewire\Component;
use Auth;
use DB;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use App\Models\Absence;
class PriceingModalComponent extends Component
{
    public  $view_attendance_date,$view_attendance_check_in,$view_attendance_check_out,$searchName,$searchMonth,$searchYear,$attendance_id;



    public function mount($attendance_id = null){
        $this->attendance_id;
    }

    public function closeViewAttendanceModal()
    {
        $this->view_attendance_id        = '';
        $this->view_attendance_date      = '';
        $this->view_attendance_check_in  = '';
        $this->view_attendance_check_out = '';
    }

    public function render(){

        if($this->searchName=='') {
            if($this->attendance_id==null) {
                $user = User::all();
            }else{
                $user=User::where('id',$this->attendance_id)->get();
            }
        }else{
            if($this->attendance_id==null) {
                $user = User::where('name', 'like', '%' . $this->searchName . '%')->get();
            }else{
                $user = User::where('name', 'like', '%' . $this->searchName . '%')->where('id',$this->attendance_id)->get();

            }
        }

        if($this->searchMonth=='' or $this->searchYear==''){
        $now = Carbon::now();
        $start = Carbon::now()->startOfMonth();
        $arr = array();
        $nowStart = strtotime($start);
        $end = strtotime($now);
        while($nowStart <= $end ) {
            $arr[] = date('Y-m-d', $nowStart);
            $nowStart = strtotime('+1 day', $nowStart);
        }
        }else{
                $now = Carbon::parse($this->searchYear.'-'.$this->searchMonth);
                $start = Carbon::parse($now->format('Y-m'))->daysInMonth;
                $arr = array();
                $nowStart = strtotime($this->searchYear.'-'.$this->searchMonth.'-01');
                $end = strtotime($this->searchYear.'-'.$this->searchMonth.'-'.$start);
            while($nowStart <= $end ) {
                $arr[] = date('Y-m-d', $nowStart);
                $nowStart = strtotime('+1 day', $nowStart);

                    }

            $start++;
        }
        return view('livewire.pricing-modal-component')->layout('livewire.layouts.base');
    }
}
