<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{HomeController, ResidentsController, AuthController};

function registerRoutes(App $app)
{
    $app->get('/', [HomeController::class, 'home']);
    $app->get('/users', [AuthController::class, 'registerView']);
    $app->post('/users', [AuthController::class, 'register']);
    $app->get('/residents', [ResidentsController::class, 'residents']);
    $app->get('/login', [AuthController::class, 'loginView']);
    $app->post('/login', [AuthController::class, 'login']);
}
