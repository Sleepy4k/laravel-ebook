<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LandingResource extends JsonResource
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
            'HTTP Method' => $this->methods,
            'Route' => $this->uri,
            'Name' => $this->action['as'],
            'Prefix' => $this->action['prefix'],
            'Middleware' => $this->action['middleware'],
            'Controller' => $this->action['controller']
        ];
    }
}
