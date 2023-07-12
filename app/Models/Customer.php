<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Customer extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use SoftDeletes, HasApiTokens, Notifiable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'customers';
    
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'middle_initial',
        'ext_name',
        'gender',
        'birthday',
        'house_no',
        'subdivision',
        'barangay',
        'city',
        'province',
        'region',
        'phone_number',
        'account_status',
        'booking_status',
        'driverse_license',
        'supporting_id',
        'supporting_id_number',
        'driverselicense_img',
        'driverselicense_img2',
        'selfie_image',
        'supportingid_img',
        'supportingid_img2',
        'contactperson1',
        'contactperson2',
        'contactperson1_number',
        'contactperson2_number',
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
    

    protected $dates = ['deleted_at'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
