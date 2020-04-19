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
    ],
];
