<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;

class ResidentsController
{
    public function __construct(private TemplateEngine $view)
    {
    }

    public function residents()
    {
        echo $this->view->render("/residents.php");
    }
}
