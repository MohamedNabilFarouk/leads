<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    use HasFactory;

    protected $fillable = ['name_en','name_ar','color'];
    protected $appends=['name_field'];
    public function tasks()
    {
        return $this->hasMany(Task::class, 'board_status');
    }
    public function getNameFieldAttribute(){

            return $this->{'name_'.app()->getLocale()} ?? $this->name;

        }
}
