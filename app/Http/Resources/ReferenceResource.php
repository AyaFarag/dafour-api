<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ReferenceResource extends Resource
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
            'paper' => new PaperResource($this -> paper),
            'title' => $this->title,
            'link' => $this->link,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
