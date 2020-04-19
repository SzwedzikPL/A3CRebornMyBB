<?php

namespace A3C\Mission\Http\Controllers;

use A3C\Core\Http\Controller;
use A3C\Core\Http\JsonResponse;
use A3C\Mission\Repositories\SlotTypeRepository;
use A3C\Core\Http\Response;

class SlotTypeController extends Controller
{
    /**
     * @param SlotTypeRepository $slotTypeRepository
     * @return Response
     */
    public function index(SlotTypeRepository $slotTypeRepository)
    {
        $slotTypes = $slotTypeRepository->getAll();
        return (new JsonResponse())->setContent($slotTypes);
    }
}
