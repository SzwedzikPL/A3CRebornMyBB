<?php

/**
 * Routes definitions
 * Example:
 *      'route_action_value' => [
 *          'method_name' => [ControllerClass, 'controllerMethod'],
 *      ]
 */
return [
    'slot-types' => [
        'get' => [\A3C\Mission\Http\Controllers\SlotTypeController::class, 'index'],
        'post' => [\A3C\Mission\Http\Controllers\SlotTypeController::class, 'create'],
    ],
    'decorations' => [
        'get' => [\A3C\Decoration\Http\Controllers\DecorationController::class, 'index'],
    ]
];
