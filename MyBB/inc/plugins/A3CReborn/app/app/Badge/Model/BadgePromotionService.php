<?php

namespace App\Badge\Model;

class BadgePromotionService
{
    /**
     * @param Badge $badge
     * @param BadgeManager $manager
     * @param HasBadge $winner
     * @param string $reason
     */
    public function grantBadge(Badge $badge, BadgeManager $manager, HasBadge $winner, string $reason)
    {

    }

    /**
     * @param Badge $badge
     * @param BadgeManager $manager
     * @param HasBadge $loser
     */
    public function takeBadge(Badge $badge, BadgeManager $manager, HasBadge $loser)
    {

    }
}
