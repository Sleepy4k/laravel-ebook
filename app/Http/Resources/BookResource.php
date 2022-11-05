<?php

namespace App\Http\Resources;

class BookResource extends Resource
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
