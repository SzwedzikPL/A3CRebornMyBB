<?php

namespace App\Badge\Model;

use Illuminate\Database\Eloquent\Model;

class BadgeGroup extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function badges()
    {
       return $this->hasMany(Badge::class);
    }
}
