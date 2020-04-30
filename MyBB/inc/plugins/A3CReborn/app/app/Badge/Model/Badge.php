<?php

namespace App\Badge\Model;

use App\Core\Model\User;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function badgeGroup()
    {
        return $this->belongsToMany(BadgeGroup::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
