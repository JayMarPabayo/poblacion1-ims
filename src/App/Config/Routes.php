<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{HomeController, ResidentsController, AuthController};
use App\Middleware\{AuthRequiredMiddleware, GuestOnlyMiddleware};

function registerRoutes(App $app)
{
    $app->get('/', [HomeController::class, 'home'])->add(AuthRequiredMiddleware::class);
    $app->get('/users', [AuthController::class, 'registerView'])->add(AuthRequiredMiddleware::class);
    $app->post('/users', [AuthController::class, 'register'])->add(AuthRequiredMiddleware::class);
    $app->get('/login', [AuthController::class, 'loginView'])->add(GuestOnlyMiddleware::class);
    $app->post('/login', [AuthController::class, 'login'])->add(GuestOnlyMiddleware::class);
    $app->get('/logout', [AuthController::class, 'logout'])->add(AuthRequiredMiddleware::class);
    $app->get('/residents', [ResidentsController::class, 'residentsView'])->add(AuthRequiredMiddleware::class);
    $app->post('/residents', [ResidentsController::class, 'create'])->add(AuthRequiredMiddleware::class);
}
