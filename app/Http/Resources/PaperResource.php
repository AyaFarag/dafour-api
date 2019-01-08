<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PaperResource extends Resource
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
            'title' => $this->title,
            'abstract' => $this->abstract,
            'file' => $this->file,
            'publication_date' => $this->publication_date,
            'school' => new SchoolResource($this -> school),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
