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
        $winner->badges()->attach($badge->id, [
            'promoter_id' => $manager->id,
            'promote_reason' => $reason,
        ]);
    }

    /**
     * @param Badge $badge
     * @param BadgeManager $manager
     * @param HasBadge $loser
     */
    public function takeBadge(Badge $badge, BadgeManager $manager, HasBadge $loser)
    {
        $loser->badges()->detach($badge->id);
    }
}
