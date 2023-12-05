<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class EmailConfig extends Model
{
    use HasFactory,UsesTenantConnection;
    protected $fillable=['email_from_address','email_from_name','smtp_host','smtp_user','smtp_password','smtp_port','smtp_security','smtp_authentication_domain','tenant_id'];
}
