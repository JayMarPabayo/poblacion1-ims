<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, OfficialsService, ResidentsService};

class OfficialsController
{
    public function __construct(private TemplateEngine $view, private ValidatorService $validatorService, private OfficialsService $officialsService, private ResidentsService $residentsService)
    {
    }

    public function officialsView()
    {
        $page = $_GET['page'] ?? 1;
        $page = (int) $page;
        $length = 10;
        $offset = ($page - 1) * $length;

        $residents = $this->residentsService->getAllResidents(
            $length,
            $offset
        );

        $officials = $this->officialsService->getAllOfficials();
        echo $this->view->render("/officials.php", [
            'officials' => $officials,
            'residents' => $residents,
            'path' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        ]);
    }

    public function create()
    {
        $this->officialsService->create($_POST);

        redirectTo('/officials');
    }
}
