<?php

namespace App\Modules\Clinics\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Modules\Clinics\Models\Doctor;
use App\Modules\Users\Models\User;

class Clinic extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'phone', 
        'address',
        'insured_patients_percent',
        'uninsured_patients_percent',
        'size',
        'ownership',
        'active'
    ];

    /**
     * The attributes that shouldn't be mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * @return belongsToMany
     */
    public function admins()
    {
        return $this->belongsToMany(User::class, 'clinic_admins');
    }

    /**
     * @return HasMany
     */
    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }
}
