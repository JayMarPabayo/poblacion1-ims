<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{HomeController, LoginController, ResidentsController, AuthController};

function registerRoutes(App $app)
{
    $app->get('/', [HomeController::class, 'home']);
    $app->get('/login', [LoginController::class, 'login']);
    $app->get('/users', [AuthController::class, 'registerView']);
    $app->post('/users', [AuthController::class, 'register']);
    $app->get('/residents', [ResidentsController::class, 'residents']);
}
