<?php

namespace Vitruvius\Contractor\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Contractor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'contractor';


    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'tax_record',
        'is_contractor',
        'phone',
        'profile_photo_path'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'tax_record'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value) {

        $this->attributes['password'] = bcrypt($value);

    }
}
