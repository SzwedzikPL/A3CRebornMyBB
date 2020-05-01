<?php

namespace App\Badge\Model;

use Illuminate\Database\Eloquent\Model;

class BadgeGroup extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'additional_data',
    ];

    /**
     * @var array
     */
    protected $with = [
        'badges',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function badges()
    {
       return $this->hasMany(Badge::class);
    }
}
