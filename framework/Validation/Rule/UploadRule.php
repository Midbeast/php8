<?php

namespace Framework\Validation\Rule;

use InvalidArgumentException;

class UploadRule implements Rule
{
    public function validate(array $data, string $field, array $params)
    {
        if (empty($_FILES[$field])) {
            return false;
        }

        if (empty($params[0])) {
            throw InvalidArgumentException('specify a max MB Size');
        }

        $maxMBSize = (int) $params[0];

        //get file size
        $file = $_FILES[$field];
        $fileSize = $file['size'];

        //convert fileSize to MB
        $fileSize = $fileSize / 1024 / 1024;

        //round fileSize to 2 decimal places
        $fileSize = round($fileSize, 2);

        if($maxMBSize < $fileSize){
            return false;
        }
        return true;
    }

    public function getMessage(array $data, string $field, array $params)
    {
        $length = (int) $params[0];

        return "{$field} is larger then {$length}MB. Please upload a smaller Image.";
    }
}
