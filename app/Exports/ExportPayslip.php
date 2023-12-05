<?php

namespace App\Exports;

use App\Models\Payroll;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;

class ExportPayslip implements WithHeadings,WithMapping,FromArray
{
    // use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public $payslip;
    public $sum_items_additions;
    public $sum_items_deductions;

    public function __construct(Payroll $payroll)
    {
        //  dd($payroll->id);
        // $this->
        // $this->payslip =  Payroll::where('id', $payroll->id)->latest()->first();
        // dd($this->payslip);
        $this->payslip = $payroll;

    }

    public function array(): array
    {
        $payslip = Payroll::where('id', $this->payslip->id)->latest()->first();
        return [$payslip];
    }

    // public function collection()
    // {
    //     //  dd($this->payslip);
    //     // return Order::all();
    //     return  $this->payslip;

    // }


    public function map($payslip): array
    {
//    dd($payslip->addition_payroll_item);
   if($payslip->addition_payroll_item){
   foreach (json_decode($payslip->addition_payroll_item) as $key=> $item){
           $this->sum_items_additions += $item;
    }
    // dd($this->sum_items_additions);
    }
   if($payslip->deduction_payroll_item){
   foreach (json_decode($payslip->deduction_payroll_item) as $key=> $item){
           $this->sum_items_deductions += $item;
    }
    // dd($this->sum_items_additions);
    }
        return [
            $payslip->id,
            $payslip->user->name,
            $payslip->net_salary,
            $payslip->basic_salary,
            $payslip-> house_allowance ,
            $payslip->transportation,
            $payslip->gosi,
            $payslip->food,
            $payslip->working_days,
            $payslip->extra_days,
            $payslip->overtime_price,
            $payslip->evening_shift,
            $payslip->other_earning,
             $this->sum_items_additions,
            $payslip->deduction,
            $payslip->month_absence,
            $payslip->loan,
            $payslip->other_deduction,
            $this->sum_items_deductions,
            $payslip->salary_month,

        ];
    }

    public function headings():array{
        return[
            'id',
            'user',
            'Net Salary',
            'Basic Salary',
            'house_allowance',
            'transportation',
            'gosi',
            'food',
            'working_days',
            'extra_days',
            'overtime_price',
            'evening_shift',
            'other_earning',
            'addition_payroll_item',
            'deduction',
            'month_absence',
            'loan',
            'other_deduction',
            'deduction_payroll_item',
            'salary_month',

        ];
    }
}
