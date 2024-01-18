<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, DocumentsService};

class DocumentsController
{
    public function __construct(private TemplateEngine $view, private ValidatorService $validatorService, private DocumentsService $documentsService)
    {
    }

    public function corView(array $parameters)
    {

        $page = $_GET['page'] ?? 1;
        $page = (int) $page;
        $length = 5;
        $offset = ($page - 1) * $length;
        $search = $_GET['search'] ?? null;

        [$records, $count] = $this->documentsService->corGetAllRecords(
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


        echo $this->view->render('services/certificate-of-residency.php', [
            'records' => $records,
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

    public function corCreate()
    {
        $this->documentsService->corCreate($_POST);
        redirectTo('certificate-of-residency');
    }

    public function corPrint(array $parameters)
    {
        $document = $this->documentsService->getCorDocument((int) $parameters['document']);

        if (!$document) {
            redirectTo('services/certificate-of-residency');
        }

        echo $this->view->render('services/templates/certificate-of-residency.php', [
            'document' => $document,
            'path' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        ]);
    }

    public function corDelete(array $parameters)
    {
        $this->documentsService->corDelete((int) $parameters['document']);

        redirectTo('/services/certificate-of-residency');
    }
}
