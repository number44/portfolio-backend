<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PriceResource extends JsonResource
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
            "a1" => $this->a1,
            "a2" => $this->a2,
            "b1" => $this->b1,
            "b2" => $this->b2,
            "c1" => $this->c1,
            "c2" => $this->c2,

        ];
    }
}
