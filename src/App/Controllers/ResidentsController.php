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
        $search = $_GET['search'] ?? null;

        [$residents, $count] = $this->residentsService->getAllResidents(
            $length,
            $offset
        );

        $lastPage = ceil($count / $length);
        $pages = $lastPage ? range(1, $lastPage) : [];
        $pageLinks = array_map(
            fn ($pageNum) => http_build_query([
                'page' => $pageNum,
                'search' => $search
            ]),
            $pages
        );

        echo $this->view->render("residents/residents.php", [
            'residents' => $residents,
            'currentPage' => $page,
            'lastPage' => $lastPage,
            'previousPageQuery' => http_build_query([
                'page' => $page - 1,
                'search' => $search
            ]),
            'nextPageQuery' => http_build_query([
                'page' => $page + 1,
                'search' => $search
            ]),
            'pageLinks' => $pageLinks,
            'search' => $search,
            'path' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        ]);
    }

    public function create()
    {
        $this->residentsService->create($_POST);

        redirectTo('/residents');
    }

    public function editView(array $parameters)
    {
        $resident = $this->residentsService->getResident($parameters['resident']);

        if (!$resident) {
            redirectTo('/');
        }

        echo $this->view->render('residents/update.php', [
            'resident' => $resident,
            'path' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        ]);
    }

    public function edit(array $parameters)
    {
        $resident = $this->residentsService->getResident($parameters['resident']);

        if (!$resident) {
            redirectTo('/');
        }

        $this->residentsService->update($_POST, $resident['resident_id']);
        redirectTo('/residents');
    }
}
