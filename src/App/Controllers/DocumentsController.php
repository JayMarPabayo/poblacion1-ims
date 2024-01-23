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

    // -- Certificate of Residency
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
    // -- END: Certificate of Residency

    // -- Certificate of Indigency
    public function coiView(array $parameters)
    {

        $page = $_GET['page'] ?? 1;
        $page = (int) $page;
        $length = 5;
        $offset = ($page - 1) * $length;
        $search = $_GET['search'] ?? null;

        [$records, $count] = $this->documentsService->coiGetAllRecords(
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


        echo $this->view->render('services/certificate-of-indigency.php', [
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
    public function coiCreate()
    {
        $this->documentsService->coiCreate($_POST);
        redirectTo('certificate-of-indigency');
    }
    public function coiPrint(array $parameters)
    {
        $document = $this->documentsService->getCoiDocument((int) $parameters['document']);

        if (!$document) {
            redirectTo('services/certificate-of-indigency');
        }

        echo $this->view->render('services/templates/certificate-of-indigency.php', [
            'document' => $document,
            'path' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        ]);
    }
    public function coiDelete(array $parameters)
    {
        $this->documentsService->coiDelete((int) $parameters['document']);

        redirectTo('/services/certificate-of-indigency');
    }
    // -- END: Certificate of Indigency

    // -- Barangay Clearance
    public function bcView(array $parameters)
    {

        $page = $_GET['page'] ?? 1;
        $page = (int) $page;
        $length = 5;
        $offset = ($page - 1) * $length;
        $search = $_GET['search'] ?? null;

        [$records, $count] = $this->documentsService->bcGetAllRecords(
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


        echo $this->view->render('services/barangay-clearance.php', [
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

    public function bcCreate()
    {
        $this->documentsService->bcCreate($_POST);
        redirectTo('barangay-clearance');
    }

    public function bcPrint(array $parameters)
    {
        $document = $this->documentsService->getBcDocument((int) $parameters['document']);

        if (!$document) {
            redirectTo('services/barangay-clearance');
        }

        echo $this->view->render('services/templates/barangay-clearance.php', [
            'document' => $document,
            'path' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        ]);
    }

    public function bcDelete(array $parameters)
    {
        $this->documentsService->bcDelete((int) $parameters['document']);

        redirectTo('/services/barangay-clearance');
    }
    // -- END: Barangay Clearance

    // -- PWD Certificate
    public function pwdView(array $parameters)
    {

        $page = $_GET['page'] ?? 1;
        $page = (int) $page;
        $length = 5;
        $offset = ($page - 1) * $length;
        $search = $_GET['search'] ?? null;

        [$records, $count] = $this->documentsService->pwdGetAllRecords(
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


        echo $this->view->render('services/pwd-certificate.php', [
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

    public function pwdCreate()
    {
        $this->documentsService->pwdCreate($_POST);
        redirectTo('pwd-certificate');
    }

    public function pwdPrint(array $parameters)
    {
        $document = $this->documentsService->getPwdDocument((int) $parameters['document']);

        if (!$document) {
            redirectTo('services/pwd-certificate');
        }

        echo $this->view->render('services/templates/pwd-certificate.php', [
            'document' => $document,
            'path' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        ]);
    }

    public function pwdDelete(array $parameters)
    {
        $this->documentsService->pwdDelete((int) $parameters['document']);

        redirectTo('/services/pwd-certificate');
    }
    // -- END: PWD Certificate
}
