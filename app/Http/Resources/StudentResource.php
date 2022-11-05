<?php

namespace App\Http\Resources;

class StudentResource extends Resource
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
            "name" => $this->name,
            "age" => $this->age . ' Tahun',
            "gender" => $this->gender,
            "email" => $this->email,
            "phone" => $this->phone,
            "address" => $this->address,
            "grade" => $this->grade
        ];
    }
}
