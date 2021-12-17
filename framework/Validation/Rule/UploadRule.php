<?php

namespace Framework\Validation\Rule;

use InvalidArgumentException;

class UploadRule implements Rule
{
    public function validate(array $data, string $field, array $params)
    {
        clearstatcache();
        if (empty($_FILES[$field])) {
            return false;
        }

        if (empty($params[0])) {
            throw InvalidArgumentException('specify a max MB Size');
        }

        $maxMBSize = (int) $params[0];

        $filepath = $_FILES[$field]['tmp_name'];
        $fileSize = filesize($filepath);
        $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
        $filetype = finfo_file($fileInfo, $filepath);

        $allowedTypes = [
            'image/png' => 'png',
            'image/jpg' => 'jpg',
            'image/jpeg' => 'jpg'
        ];

        if (!array_key_exists($filetype, $allowedTypes)) {
            return false;
        }

        $fileSize = $fileSize / 1024 / 1024;

        $fileSize = round($fileSize, 2);

        return $maxMBSize >= $fileSize;
    }

    public function getMessage(array $data, string $field, array $params)
    {
        $length = (int) $params[0];

        return "{$field} is larger then {$length}MB. Please upload a smaller Image.";
    }
}
