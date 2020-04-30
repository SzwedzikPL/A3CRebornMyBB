<?php

namespace App\Core\Http\Resources;

use App\Badge\Http\Resources\BadgeCollection as BadgeCollectionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if (!$this->resource) return [];

        return [
            'name' => $this->resource->username,
            'badges' => new BadgeCollectionResource($this->resource->badges)
        ];
    }
}
