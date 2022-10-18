<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
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
            'nama' => $this->nama,
            'Tempat, tanggal lahir' => $this->tempat_lahir . ', '. $this->tanggal_lahir,
            'jenis kelamin' => $this->kelamin,
            'email' => $this->email,
            'nomor_hp' => $this->nomor_hp
        ];
    }
}
