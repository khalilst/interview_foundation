<?php

namespace App\Http\Resources\Github;

use Illuminate\Http\Resources\Json\JsonResource;

class StarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'url' => $this->html_url,
        ];
    }
}
