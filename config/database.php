<?php

return [
    'default' => 'mysql',
    'mysql' => [
        'type' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '9005',
        'database' => 'php_book',
        'username' => 'root',
        'password' => 'root',
    ],
    'sqlite' => [
        'type' => 'sqlite',
        'path' => __DIR__ . '/../database/database.sqlite',
    ],
];
