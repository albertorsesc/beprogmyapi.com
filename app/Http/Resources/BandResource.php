<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class BandResource extends JsonResource
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
            'name' => $this->name,
            'start_at' => $this->start_at,
            'genres' => $this->whenLoaded('genres'),
            'country' => $this->whenLoaded('country'),
            'city' => $this->city,
            'bio' => $this->bio,
            'image' => $this->image ? config('app.url') . $this->image : null,
        ];
    }
}
