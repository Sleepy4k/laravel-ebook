<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            "ID" => $this->id,
            "Nama" => $this->name,
            "Umur" => $this->age . ' Tahun',
            "Jenis Kelamin" => $this->gender,
            "Surel" => $this->email,
            "Nomor Handphone" => $this->phone,
            "Alamat Rumah" => $this->address,
            "Kelas" => $this->grade
        ];
    }
}
