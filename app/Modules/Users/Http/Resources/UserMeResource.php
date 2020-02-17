<?php

namespace App\Http\Modules\Users\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\Users\Models\Role;

class UserMeResource extends JsonResource
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
            'id'    => $this->id,
            'name'  => $this->name,
            'email' => $this->email,
            'role'  => $this->getRole($this->roles()->first()),
        ];
    }

    /**
     * Get role information
     *
     * @param Role $role
     * @return array
     */
    private function getRole(Role $role): array
    {
        return [
            'title' => $role->display_name ,
            'slug' => $role->name,
        ];
    }
}
