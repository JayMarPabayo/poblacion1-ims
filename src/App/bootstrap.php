<?php

declare(strict_types=1);

require __DIR__ . "/../../vendor/autoload.php";

use Framework\App;
use App\Controllers\{HomeController, LoginController};


$app = new App();

$app->get('/', [HomeController::class, 'home']);
$app->get('/login', [LoginController::class, 'login']);

return $app;
