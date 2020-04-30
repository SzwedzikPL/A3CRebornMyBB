<?php

namespace App\Badge\Http\Controllers;

use App\Badge\Http\Requests\BadgePromoteRequest;
use App\Badge\Model\Badge;
use App\Badge\Model\BadgePromotionService;
use App\Core\Http\Controllers\Controller;

class BadgePromoteController extends Controller
{
    public function __invoke(BadgePromoteRequest $request, BadgePromotionService $badgePromotionService)
    {
        $this->authorize('promote', Badge::class);
        // TODO: Implement __invoke() method.
    }
}
