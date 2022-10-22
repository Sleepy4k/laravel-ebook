<?php

namespace App\Http\Resources;

use App\Models\Author;
use App\Models\BookCategory;
use App\Models\Publisher;
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
        $this->author_id = Author::find($this->author_id)->nama;
        $this->publisher_id = Publisher::find($this->publisher_id)->nama;
        $this->category_id = BookCategory::find($this->category_id)->nama;

        return [
            'ID' => $this->id,
            'Judul' => $this->judul,
            'Deskripsi' => $this->deskripsi,
            'Penulis' => $this->author_id,
            'Penerbit' => $this->publisher_id,
            'Kategori' => $this->category_id,
            'Tanggal Terbit' => $this->tanggal_terbit,
            'Status' => ($this->tersedia == 'Y') ? 'Tersedia' : 'Tidak Tersedia'
        ];
    }
}
