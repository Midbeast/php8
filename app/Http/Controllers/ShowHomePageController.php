<?php

namespace App\Http\Controllers;

use Framework\Database\Factory;
use Framework\Database\Connection\MysqlConnection;
use Framework\Database\Connection\SqliteConnection;

class ShowHomePageController
{
    public function handle()
    {
        $factory = new Factory();

        $factory->addConnector('mysql', function($config) {
            return new MysqlConnection($config);
        });

        $connection = $factory->connect([
            'type' => 'mysql',
            'host' => 'localhost',
            'port' => '9005',
            'database' => 'php_book',
            'username' => 'root',
            'password' => 'root',
        ]);

        $product = $connection
            ->query()
            ->select()
            ->from('products')
            ->first();
        return view('home', [
            'number' => 42,
            'featured' => $product,
        ]);
    }
}