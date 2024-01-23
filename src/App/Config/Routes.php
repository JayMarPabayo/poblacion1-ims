<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{HomeController, ResidentsController, AuthController, OfficialsController, ErrorController, DocumentsController};
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

    // -- DOCUMENT ROUTES
    $app->get('/services/certificate-of-residency', [DocumentsController::class, 'corView'])->add(AuthRequiredMiddleware::class);
    $app->post('/services/certificate-of-residency', [DocumentsController::class, 'corCreate'])->add(AuthRequiredMiddleware::class);
    $app->get('/services/certificate-of-residency/{document}', [DocumentsController::class, 'corPrint'])->add(AuthRequiredMiddleware::class);
    $app->delete('/services/certificate-of-residency/{document}', [DocumentsController::class, 'corDelete'])->add(AuthRequiredMiddleware::class);

    $app->get('/services/certificate-of-indigency', [DocumentsController::class, 'coiView'])->add(AuthRequiredMiddleware::class);
    $app->post('/services/certificate-of-indigency', [DocumentsController::class, 'coiCreate'])->add(AuthRequiredMiddleware::class);
    $app->get('/services/certificate-of-indigency/{document}', [DocumentsController::class, 'coiPrint'])->add(AuthRequiredMiddleware::class);
    $app->delete('/services/certificate-of-indigency/{document}', [DocumentsController::class, 'coiDelete'])->add(AuthRequiredMiddleware::class);

    $app->get('/services/barangay-clearance', [DocumentsController::class, 'bcView'])->add(AuthRequiredMiddleware::class);
    $app->post('/services/barangay-clearance', [DocumentsController::class, 'bcCreate'])->add(AuthRequiredMiddleware::class);
    $app->get('/services/barangay-clearance/{document}', [DocumentsController::class, 'bcPrint'])->add(AuthRequiredMiddleware::class);
    $app->delete('/services/barangay-clearance/{document}', [DocumentsController::class, 'bcDelete'])->add(AuthRequiredMiddleware::class);

    $app->get('/services/pwd-certificate', [DocumentsController::class, 'pwdView'])->add(AuthRequiredMiddleware::class);
    $app->post('/services/pwd-certificate', [DocumentsController::class, 'pwdCreate'])->add(AuthRequiredMiddleware::class);
    $app->get('/services/pwd-certificate/{document}', [DocumentsController::class, 'pwdPrint'])->add(AuthRequiredMiddleware::class);
    $app->delete('/services/pwd-certificate/{document}', [DocumentsController::class, 'pwdDelete'])->add(AuthRequiredMiddleware::class);

    $app->get('/services/business-clearance', [DocumentsController::class, 'bncView'])->add(AuthRequiredMiddleware::class);
    $app->post('/services/business-clearance', [DocumentsController::class, 'bncCreate'])->add(AuthRequiredMiddleware::class);
    $app->get('/services/business-clearance/{document}', [DocumentsController::class, 'bncPrint'])->add(AuthRequiredMiddleware::class);
    $app->delete('/services/business-clearance/{document}', [DocumentsController::class, 'bncDelete'])->add(AuthRequiredMiddleware::class);

    $app->setErrorHandler([ErrorController::class, 'notFound']);
}
