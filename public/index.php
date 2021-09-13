<?php

include_once __DIR__."/../vendor/autoload.php";
include_once __DIR__."/../app/functions.php";

use App\Controllers\BlogController;
use App\Controllers\CatalogController;
use App\Controllers\HomeController;


$routes = [
    '/catalog/(?P<id>.+)' => [CatalogController::class, 'showProduct'],
    '/add_page' => [BlogController::class, 'addPage'],
    '/save_page' => [BlogController::class, 'savePage'],
    '/page/(?P<id>.+)' => [BlogController::class, 'showPage'],
    '/product/(?P<id>.+)' => [CatalogController::class, 'showProduct'],
    '/add_product' => [CatalogController::class, 'addProduct'],
    '/save_product' => [CatalogController::class, 'saveProduct'],
    '/catalog' =>[CatalogController::class, 'index'],
    '/contacts' => [HomeController::class, 'contacts'],
    '/' => [HomeController::class, 'index'],
];


$url = (explode('?', $_SERVER['REQUEST_URI']))[0];

foreach ($routes as $route => $item){
    $route = str_replace('/', '\/', $route);
    preg_match('/^'.$route.'$/', $url, $matches);
    if (!empty($matches)){
        $args = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
        $controller = new $item[0];
        call_user_func_array([$controller, $item[1]], $args);
        break;
    }
}


if(empty($matches)){
    echo "404";
}







