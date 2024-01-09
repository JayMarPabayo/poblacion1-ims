<?php

declare(strict_types=1);

namespace Framework;

use Framework\Contracts\RuleInterface;
use Framework\Exceptions\ValidationException;

class Validator
{
    private $rules = [];

    public function add(string $alias, RuleInterface $rule)
    {
        $this->rules[$alias] = $rule;
    }

    public function validate(array $formData, array $fields)
    {
        $errors = [];
        foreach ($fields as $fieldname => $rules) {
            foreach ($rules as $rule) {
                $ruleParams = [];

                if (str_contains($rule, ":")) {
                    [$rule, $ruleParams] = explode(':', $rule);
                    $ruleParams = explode(',', $ruleParams);
                }

                $ruleValidator = $this->rules[$rule];

                if ($ruleValidator->validate($formData, $fieldname, [])) {
                    continue;
                }

                $errors[$fieldname][] = $ruleValidator->getMessage(
                    $formData,
                    $fieldname,
                    $ruleParams
                );
            }
        }

        if (count($errors)) {
            throw new ValidationException($errors);
        }
    }
}
