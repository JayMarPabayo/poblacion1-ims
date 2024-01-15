<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{HomeController, ResidentsController, AuthController, OfficialsController, ErrorController, DocumentController};
use App\Middleware\{AuthRequiredMiddleware, GuestOnlyMiddleware};

function registerRoutes(App $app)
{
    $app->get('/', [HomeController::class, 'home'])->add(AuthRequiredMiddleware::class);


    $app->get('/users', [AuthController::class, 'registerView'])->add(AuthRequiredMiddleware::class);
    $app->post('/users', [AuthController::class, 'register'])->add(AuthRequiredMiddleware::class);
    $app->get('/users/{user}', [AuthController::class, 'editView'])->add(AuthRequiredMiddleware::class);
    $app->post('/users/{user}', [AuthController::class, 'edit'])->add(AuthRequiredMiddleware::class);
    $app->delete('/users/{user}', [AuthController::class, 'delete'])->add(AuthRequiredMiddleware::class);


    $app->get('/login', [AuthController::class, 'loginView'])->add(GuestOnlyMiddleware::class);
    $app->post('/login', [AuthController::class, 'login'])->add(GuestOnlyMiddleware::class);
    $app->get('/logout', [AuthController::class, 'logout'])->add(AuthRequiredMiddleware::class);


    $app->get('/residents', [ResidentsController::class, 'residentsView'])->add(AuthRequiredMiddleware::class);
    $app->post('/residents', [ResidentsController::class, 'create'])->add(AuthRequiredMiddleware::class);
    $app->get('/residents/{resident}', [ResidentsController::class, 'editView'])->add(AuthRequiredMiddleware::class);
    $app->get('/fetchresidents', [ResidentsController::class, 'fetchResidents'])->add(AuthRequiredMiddleware::class);
    $app->post('/residents/{resident}', [ResidentsController::class, 'edit'])->add(AuthRequiredMiddleware::class);
    $app->delete('/residents/{resident}', [ResidentsController::class, 'delete'])->add(AuthRequiredMiddleware::class);


    $app->get('/officials', [OfficialsController::class, 'officialsView'])->add(AuthRequiredMiddleware::class);
    $app->post('/officials', [OfficialsController::class, 'create'])->add(AuthRequiredMiddleware::class);
    $app->get('/officials/{official}', [OfficialsController::class, 'editView'])->add(AuthRequiredMiddleware::class);
    $app->post('/officials/{official}', [OfficialsController::class, 'edit'])->add(AuthRequiredMiddleware::class);
    $app->delete('/officials/{official}', [OfficialsController::class, 'delete'])->add(AuthRequiredMiddleware::class);

    $app->setErrorHandler([ErrorController::class, 'notFound']);

    // -- DOCUMENT ROUTES

    $app->get('/services/certificate-of-residency', [DocumentController::class, 'COR_View'])->add(AuthRequiredMiddleware::class);
}
