<?php


use JetBrains\PhpStorm\NoReturn;

$requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$requestPath = $_SERVER['REQUEST_URI'] ?? '/';

 if ($requestMethod === 'GET' and $requestPath === '/')
 {
     include(__DIR__ . '/includes/homepage.php');
 }
 else if($requestPath === '/old-home')
 {
     redirectForeverTo('/');
 }
 else if($requestPath === '/test')
 {
     redirectForeverTo('/');
 }
 else
 {
     include(__DIR__ . '/includes/404.php');
 }

#[NoReturn] 
function redirectForeverTo($path) {
    header("Location: {$path}", $replace = true, $code = 301);
    exit;
}