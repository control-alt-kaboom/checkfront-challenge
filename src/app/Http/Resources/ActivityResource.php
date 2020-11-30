<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
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
            'act_timestamp' => $this->act_timetsamp,
            'act_type' => $this->act_type,
        ];
    }
}
