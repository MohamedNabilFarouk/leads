<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Traits\CrudTrait;
use App\Models\Property_finishing;

class PropertyFinshingController extends Controller
{
    use GeneralTrait;
    use CrudTrait;
    public function __construct()
    {
        $this->getModel(Property_finishing::class);
    }
    public function index()
    {

       $row = $this->getIndex();
        return $this->generalResponse(200,$row);
    }
}
