<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Validator;
use Framework\Rules\{RequiredRule, EmailRule};

class ValidatorService
{
    private Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator();
        $this->validator->add('required', new RequiredRule());
        $this->validator->add('email', new EmailRule());
    }

    public function validateRegister(array $formData)
    {
        $this->validator->validate($formData, [
            'first-name' => ['required'],
            'middle-name' => ['required'],
            'last-name' => ['required'],
            'email' => ['required', 'email'],
            'user-username' => ['required'],
            'user-password' => ['required'],
            'user-role' => ['required']
        ]);
    }
}
