<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PlanResource extends Resource
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
            'title_en' => $this->title_en,
            'title_ar' => $this->title_ar,
            'duration' => $this->duration,
            'price' => $this->price,
            'description_en' => $this->description_en,
            'description_ar' => $this->description_ar,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
