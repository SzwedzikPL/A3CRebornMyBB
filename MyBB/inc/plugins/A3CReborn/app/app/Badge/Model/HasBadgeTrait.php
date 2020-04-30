<?php

namespace App\Badge\Model;

trait HasBadgeTrait
{
    public function badges()
    {
        return $this->belongsToMany(Badge::class);
    }
}
