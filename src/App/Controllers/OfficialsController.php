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
        $length = 5;
        $offset = ($page - 1) * $length;

        [$residents] = $this->residentsService->getAllResidents(
            $length,
            $offset
        );

        $officials = $this->officialsService->getAllOfficials();
        echo $this->view->render("officials/officials.php", [
            'officials' => $officials,
            'residents' => $residents,
            'path' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        ]);
    }

    public function create()
    {
        $this->officialsService->create($_POST);

        redirectTo('officials');
    }

    public function editView(array $parameters)
    {
        $page = $_GET['page'] ?? 1;
        $page = (int) $page;
        $length = 5;
        $offset = ($page - 1) * $length;

        [$residents] = $this->residentsService->getAllResidents(
            $length,
            $offset
        );


        $official = $this->officialsService->getOfficial($parameters['official']);

        if (!$official) {
            redirectTo('/');
        }

        echo $this->view->render('officials/update.php', [
            'official' => $official,
            'residents' => $residents,
            'path' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        ]);
    }

    public function edit(array $parameters)
    {
        $official = $this->officialsService->getOfficial($parameters['official']);

        if (!$official) {
            redirectTo('/');
        }

        $this->officialsService->update($_POST, $official['official_id']);
        redirectTo('/officials');
    }


    public function delete(array $parameters)
    {

        $this->officialsService->delete((int) $parameters['official']);

        redirectTo('/officials');
    }
}
