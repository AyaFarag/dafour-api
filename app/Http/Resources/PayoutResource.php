<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PayoutResource extends Resource
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
            'professional' => new ProfessionalResource($this -> professional),
            'status' => $this->status,
            'comment' => $this->comment,
            'transaction_time' => $this->transaction_time,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
