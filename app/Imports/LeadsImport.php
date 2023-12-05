<?php

namespace App\Imports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Hash;

class LeadsImport implements ToModel,WithHeadingRow,WithValidation
{

    protected $rec;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
$rec['name'] = $row['name']??'';
$rec['phone']=$row['phone']??'';
$rec['note'] = $row['note'] ??'';
$rec['email']=   $row['email']??'';


        return new Lead([
                      'name'     =>  $rec['name'],
                      'phone'     =>  $rec['phone'],
                      'created_by' =>  auth()->user()->id,
                      'note'     =>   $rec['note'],
                      'email'   =>      $rec['email'],
        ]);


    }

    public function headingRow(): int
    {
        return 1;
    }


    public function rules(): array
    {

        return [
            'name'             =>'nullable|string|min:2|max:255',
            'note'              =>'nullable|string',
            'email'                  => 'nullable|email|max:255',
            'phone'           => 'required|numeric'


        ];
    }
    public function messages(): array
    {
        return [
            // 'email.unique' => 'The email :input already exists in the database.'
        ];
    }

}
