<?php

namespace App\Badge\Model;

interface HasBadge
{
    /**
     * @return mixed all owned badges
     */
    public function badges();
}
