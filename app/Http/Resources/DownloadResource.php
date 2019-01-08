<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class DownloadResource extends Resource
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
            "student"    => new StudentResource($this -> student),
            "paper"    => new PaperResource($this -> paper),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
