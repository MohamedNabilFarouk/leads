<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel,WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new User([
            'first_name' => $row['first_name'],
            'last_name'=>$row['last_name'],
            'name'=>  $row['first_name'].' '.$row['last_name'],
            'email'=>$row['email'],
            'password' => Hash::make($row['password']),
// data from dropdown
            'religion'=>$row['religion'],
            'nationality'=> $row['nationality'],
            'marital_status'=>$row['marital_status'],
            'department'=>$row['department'],
            'Job_title'=>$row['job_title'],
            'gender'=>$row['gender'],
            'reports_to'=>   $row['reports_to'],
            'role_id'=>        $row['role_id'],
// end data from dropdown


            'birthday' => $row['birthday'],
        'residence_number' => $row['residence_number'],
        'employee_id' => $row['employee_id'],
        'passport_no' => $row['passport_no'],
        'phone_number' => $row['phone_number'],
        'home_number' => $row['home_number'],
        'address' => $row['address'],
        'family_member' => $row['family_member'],
        'relative' => $row['relative'],
        'contract_starting_date' => $row['contract_starting_date'],
        'contract_expiration_date' => $row['contract_expiration_date'],
        'starting_work_date' => $row['starting_work_date'],
        'annual_leave' => $row['annual_leave'],
        'work_card_expiry_date_non_saudi' => $row['work_card_expiry_date_non_saudi'],
        'basic_salary' => $row['basic_salary'],
        'transport_allowance' => $row['transport_allowance'],
        'housing_allowance' => $row['housing_allowance'],
        'food_allowance' => $row['food_allowance'],
        'night_work_allowance' => $row['night_work_allowance'],
        'state' => $row['state'],
        'country' => $row['country'],

        'shift_duration' => $row['shift_duration'],


        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }


    public function rules(): array
    {
        return [

            'first_name'             =>'required|string|min:2|max:255',
            'last_name'              =>'required|string|min:2|max:255',
//             'name'                   => 'required|string|min:4|max:255',
            'email'                  => 'required|email|max:255|unique:users',
            'password'               => 'required|min:8',

            'birthday'               => 'required|date',
            'religion'               => 'required',
            'employee_id'            => 'required|numeric|unique:users',
            'phone_number'           => 'required|numeric',
//             'home_number'            => 'numeric',
             'address'               => 'required',
             'contract_starting_date'=> 'required|date',
             'job_title'             => 'required',
             'basic_salary'          => 'required|numeric|min:0',
             //'photo'                 => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'gender'                => 'required',
             'state'                 => 'required',
             'country'               => 'required',
             'reports_to'            => 'required',
             'role_id'               => 'required',
           //   'shift_from'            => 'required',
           //   'shift_to'              => 'required',
             'shift_duration'         => 'required',
             'residence_number'      => 'required|min:10',
           'contract_expiration_date'=>'required|date',
           'starting_work_date'      =>'required|date',
           'annual_leave'            => 'required'

        ];
    }
    public function messages(): array
    {
        return [
            'email.unique' => 'The email :input already exists in the database.'
        ];
    }

}
