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
        $residents = $this->residentsService->getAllResidents();
        echo $this->view->render("/residents.php", [
            'residents' => $residents
        ]);
    }

    public function create()
    {
        $this->residentsService->create($_POST);

        redirectTo('/residents');
    }
}
