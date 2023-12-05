<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_module extends Model
{
    use HasFactory;
    protected $table = 'role_modules';
    protected $fillable = [
      'role_id',
      'module_id',
    ];
}
