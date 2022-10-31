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
            'Nama Pengguna' => $this->name,
            'Nama Alias' => $this->username,
            'Bergabung Pada' => $this->created_at->format('d-m-Y')
        ];
    }
}
