<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\ResourceCollection;


class ModelCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'meta' => ['count' => $this->collection->count()],
        ];
    }
}

