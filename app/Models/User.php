<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use App\Models\Designations;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable  implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles,HasPermissions,SoftDeletes,UsesTenantConnection;
    protected $connection = "mysql" ;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'name',
        'email',
        'password',
        'photo',
        'phone_number',
        'reports_to',
        'role_id',
        'lang',
        'token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function dep(){
        return $this->belongsTo(Department::class,'department','id');
    }

    public function role(){
        return $this->belongsTo(Role::class,'role_id');
    }

    public function job(){
        return $this->belongsTo(Designations::class,'Job_title');
    }



    public function reportTo(){
        return $this->belongsTo('\App\Models\User','reports_to');
    }
    public function getPhotoAttribute($value){

        if(( $value ==  null) ||( !file_exists(public_path($value))) ){
            return  asset('photos/default_user.jpg');
        }else{
            return $value;
        }


    }


    public function userrole(){
        return $this->belongsTo('\App\Models\Role','role_id');
            }

}
