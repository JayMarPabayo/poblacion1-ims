<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, ResidentsService};

class ResidentsController
{
    public function __construct(private TemplateEngine $view, private ValidatorService $validatorService, private ResidentsService $residentsService)
    {
    }

    public function residentsView()
    {
        $page = $_GET['page'] ?? 1;
        $page = (int) $page;
        $length = 10;
        $offset = ($page - 1) * $length;

        $residents = $this->residentsService->getAllResidents(
            $length,
            $offset
        );
        echo $this->view->render("/residents.php", [
            'residents' => $residents,
            'path' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        ]);
    }

    public function create()
    {
        $this->residentsService->create($_POST);

        redirectTo('/residents');
    }
}
