<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "first_name" => $this->first_name,
            "middle_name" => $this->middle_name,
            "last_name" => $this->last_name,
            "bday" => $this->bday,
            "brgy" => $this->brgy,
            "city_mun" => $this->city_mun,
            "prov" => $this->prov,
            "contact_no" => $this->contact_no,
            "email" => $this->email,
            "dept" => $this->dept,
            "sss" => $this->sss,
            "tin" => $this->tin,
            "philhealth" => $this->philhealth,
            "type" => $this->type
        ];
    }
}
