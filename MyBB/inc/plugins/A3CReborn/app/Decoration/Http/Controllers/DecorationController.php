<?php

namespace A3C\Decoration\Http\Controllers;

use A3C\Core\Http\Controller;
use A3C\Core\Http\JsonResponse;
use A3C\Decoration\Repositories\DecorationRepository;
use A3C\Core\Http\Response;

class DecorationController extends Controller
{
    /**
     * @param DecorationRepository $decorationRepository
     * @return Response
     */
    public function index(DecorationRepository $decorationRepository)
    {
        $decorations = $decorationRepository->getAll();
        return (new JsonResponse())->setContent($decorations);
    }
}
