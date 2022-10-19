<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'ID' => $this->id,
            'Judul' => $this->judul,
            'Deskripsi' => $this->deskripsi,
            'Author' => $this->author,
            'Penerbit' => $this->penerbit,
            'Tanggal Terbit' => $this->tanggal_terbit
        ];
    }
}
