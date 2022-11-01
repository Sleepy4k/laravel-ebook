<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuditResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $subject = ($this->subject_id ? $this->subject_id : 'null') . ' | ' . ($this->subject_type ? $this->subject_type : 'null');
        $causer = ($this->causer_id ? $this->causer_id : 'null') . ' | ' . ($this->causer_type ? $this->causer_type : 'null');

        return [
            'id' => $this->id,
            'log_name' => $this->log_name,
            'description' => $this->description,
            'subject' => $subject,
            'event' => $this->event,
            'causer' => $causer,
            'properties' => $this->properties
        ];
    }
}
