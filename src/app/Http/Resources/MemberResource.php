<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     *  @param  \Illuminate\Http\Request  $request
     *  @return array
     **/
    public function toArray($request)
    {
        return [
            'user_id' => $this->user_id,
            'signup_date' => $this->signup_date,
            'channel' => $this->channel,
        ];
    }
}