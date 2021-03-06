<?php

namespace App\Modules\Clinics\Http\Resources\Clinics;

use Illuminate\Http\Resources\Json\JsonResource;

class ClinicAdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'email'     => $this->email,
            'active'    => $this->active,
        ];
    }
}
