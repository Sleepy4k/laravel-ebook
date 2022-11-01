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
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'author' => $this->author->name,
            'publisher' => $this->publisher->name,
            'category' => $this->category->name,
            'date_of_issue' => dateYmdToDmy($this->date_of_issue),
            'status' => ($this->available == 'Y') ? 'Tersedia' : 'Tidak Tersedia'
        ];
    }
}
