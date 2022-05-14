<?php

namespace App\Http\Resources\Bands;

use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
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
            'released_at' => $this->released_at,
            'record_label' => $this->record_label,
            'purchase_link' => $this->purchase_link,
            'description' => $this->description,
            'band' => new BandResource($this->whenLoaded('band')),
            'creator' => $this->whenLoaded('creator'),
            'image' => $this->image ? config('app.url') . $this->image : null
        ];
    }
}
