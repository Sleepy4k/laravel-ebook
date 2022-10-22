<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SiswaResource extends JsonResource
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
            "Nama" => $this->nama,
            "Umur" => $this->umur . ' Tahun',
            "Jenis Kelamin" => $this->kelamin,
            "Surel" => $this->email,
            "Nomor Handphone" => $this->nomor_hp,
            "Alamat Rumah" => $this->alamat,
            "Kelas" => $this->kelas
        ];
    }
}
