<?php

use App\Controller\DataController;
use App\Controller\GraphController;
use App\Controller\ReportController;
use Slim\Routing\RouteCollectorProxy;

//reports routes
$app->group('/reports', function(RouteCollectorProxy $group) {
    $group->get('', [ReportController::class, 'index']);
    $group->get('/{report:[0-9]+}', [ReportController::class, 'report']);
    $group->get('/{report:[0-9]+}/suites/{suite:[0-9]+}', [ReportController::class, 'suite']);

    $group->delete('/{report:[0-9]+}', [ReportController::class, 'delete']);
});
$app->get('/hook/add', [ReportController::class, 'insert']);

//graph routes
$app->group('/graph', function(RouteCollectorProxy $group) {
    $group->get('', [GraphController::class, 'index']);
    $group->get('/parameters', [GraphController::class, 'parameters']);
});

//data routes
$app->get('/data/badge', [DataController::class, 'badge']);

