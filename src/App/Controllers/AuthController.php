<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, UserService};

class AuthController
{
    public function __construct(private TemplateEngine $view, private ValidatorService $validatorService, private UserService $userService)

    {
    }

    public function registerView()
    {
        $users = $this->userService->getAllUsers();
        echo $this->view->render("users.php", [
            'users' => $users,
            'path' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        ]);
    }

    public function register()
    {
        // $this->validatorService->validateRegister($_POST);
        // $this->userService->isEmailTaken($_POST['email']);
        $this->userService->create($_POST);
        redirectTo('/');
    }

    public function loginView()
    {
        echo $this->view->render("login.php", [
            'path' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        ]);
    }

    public function login()
    {
        $this->userService->login($_POST);

        redirectTo('/');
    }

    public function logout()
    {
        $this->userService->logout();
        redirectTo('/login');
    }
}
