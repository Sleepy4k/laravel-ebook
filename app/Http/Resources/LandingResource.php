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
            'http_method' => $this->methods,
            'uri' => $this->uri,
            'route' => $this->action['as'],
            'prefix' => $this->action['prefix'],
            'middleware' => $this->action['middleware'],
            'controller' => $this->action['controller']
        ];
    }
}
