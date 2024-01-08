<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{HomeController, LoginController};

function registerRoutes(App $app)
{
    $app->get('/', [HomeController::class, 'home']);
    $app->get('/login', [LoginController::class, 'login']);
}
