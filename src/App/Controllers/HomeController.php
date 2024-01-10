<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;

class HomeController
{
    public function __construct(private TemplateEngine $view)
    {
    }

    public function home()
    {
        echo $this->view->render("/index.php", [
            'path' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        ]);
    }
}
