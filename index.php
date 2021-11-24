<?php


$requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$requestPath = $_SERVER['REQUEST_URI'] ?? '/';

 if ($requestMethod === 'GET' and $requestPath === '/')
 {
     include(__DIR__ . '/includes/homepage.php');
 }
 else if($requestPath === '/old-home')
 {
     header('Location: /', $replace = true, $code = 301);
     exit;
 }
 else
 {
     include(__DIR__ . '/includes/404.php');
 }