<?php

namespace App\Modules\Clinics\Models;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes
};

class Doctor extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'clinic_id',
        'name', 
        'gender', 
        'credential',
        'field',
        'minority_status',
    ];

    /**
     * The attributes that shouldn't be mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];
}
