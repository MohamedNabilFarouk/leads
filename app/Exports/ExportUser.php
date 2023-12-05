<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ExportUser implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return User::all();
        return User::select('id','name','email','phone' , 'created_at')->get();

    }

    public function headings():array{
        return[
            'Id',
            ' Name',
            ' email',
            ' phone',
            'Jioned_at',

        ];
    }

}
