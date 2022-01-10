<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "ename" => $this->ename,
            "thumbnail" => $this->thumbnail,
            "price" => $this->price,
            "availability" => $this->availability,
            "internet" => $this->internet,
            "tv" => $this->tv,
            "washing_machine" => $this->washing_machine,
            "dryer" => $this->dryer,
            "parking" => $this->parking,
            "elevator" => $this->elevator,
            "oven" => $this->oven,
            "equipped_kitchen" => $this->equipped_kitchen,
            "location" => $this->location->name,
            "location_id" => $this->location_id,
            "roomtype_id" => $this->roomtype_id,
            "roomtype" =>$this->roomtype->name,
            "about" => $this->about,
            "eabout" => $this->eabout,
            "info" => $this->info,
            "einfo" => $this->einfo,
            "rooms" => $this->rooms,
            "beds" => $this->beds,
            "guests" =>$this->guests,
            "bathrooms"  =>$this->bathrooms,


        ];
    }
}
