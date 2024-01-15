<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService};

class DocumentController
{
    public function __construct(private TemplateEngine $view, private ValidatorService $validatorService)
    {
    }

    public function COR_View(array $parameters)
    {

        echo $this->view->render('documents/certificate-of-residency.php', [
            'path' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        ]);
    }
}
