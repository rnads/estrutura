<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use TJGazel\LaravelDocBlockAcl\Models\Contracts\UserAcl as UserAclContract;
use TJGazel\LaravelDocBlockAcl\Models\traits\UserAcl as UserAcltrait;

class User extends Authenticatable implements UserAclContract
{
    use Notifiable, UserAclTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'img_profile', 'status', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getStatusIconAttribute()
    {
        if($this->status == 1){
            $status = '<i class="fas fa-check text-success"></i>';
        }
        else{
            $status = '<i class="far fa-ban text-danger"></i>';
        }

        return $status;
    }
}
