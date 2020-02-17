<?php

namespace App\Modules\Users\Models;

use Illuminate\Database\Eloquent\Model;

class UserInvitation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'token',
    ];
}
