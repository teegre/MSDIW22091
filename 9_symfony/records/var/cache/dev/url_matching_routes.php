<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/artists' => [[['_route' => 'app_artists', '_controller' => 'App\\Controller\\ArtistsController::index'], null, ['GET' => 0], null, false, false, null]],
        '/' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, ['GET' => 0], null, false, false, null]],
        '/records' => [[['_route' => 'app_records', '_controller' => 'App\\Controller\\RecordsController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/artist/([^/]++)(*:58)'
                .'|/record/([^/]++)(*:81)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        58 => [[['_route' => 'app_artist', '_controller' => 'App\\Controller\\ArtistController::index'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        81 => [
            [['_route' => 'app_record', '_controller' => 'App\\Controller\\RecordController::index'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
