<?php

namespace App\Badge\Http\Controllers;

use App\Badge\Http\Requests\BadgeTakeRequest;
use App\Badge\Model\Badge;
use App\Badge\Model\BadgePromotionService;
use App\Core\Http\Controllers\Controller;

class BadgeTakeController extends Controller
{
    public function __invoke(BadgeTakeRequest $request, BadgePromotionService $badgePromotionService)
    {
        $this->authorize('take', Badge::class);
        // TODO: Implement __invoke() method.
    }
}
