<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
class UserHouseAllowance extends Model
{
    use UsesTenantConnection;
protected $table='user_house_allowance',
// guard array
$guarded=[];


}
