<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'Total_VOTP_Bought',
        'Total_VOTP_Used',
         'Total_VOTP_Remaining',
         'VOTP_Dialing_MSISDN',
         'Customers_Listening_to_OTPs',
         'Quick_VOTP_Activity_Reports_Today',
         'Success_Rate_of_VOTP_today',
         'Total_VOTP_API_Calls_Today',
         'Total_VOTP_Delivered_Today',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
