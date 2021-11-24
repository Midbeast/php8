<?php


$requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$requestPath = $_SERVER['REQUEST_URI'] ?? '/';

if ($requestMethod === 'GET' and $requestPath === '/') {
     print 'hello world';
} else {
     print '404 not found';
}