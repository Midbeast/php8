<?php

namespace Framework\Validation\Rule;

use InvalidArgumentException;

class MinRule implements Rule
{
    public function validate(array $data, string $field, array $params)
    {
        if (empty($data[$field])) {
            return true;
        }

        if (empty($params[0])) {
            throw InvalidArgumentException('specify a min length');
        }
        $minLength = (int) $params[0];
        $currentLength = strlen($data[$field]);

        if($currentLength < $minLength) {
            return false;
        }
        return true;
    }

    public function getMessage(array $data, string $field, array $params)
    {
        $length = (int) $params[0];

        return "{$field} should be at least {$length} characters";
    }
}
