<?php

ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();

require_once (__DIR__. '/vendor/autoload.php');

define('ROOT', __DIR__);
$routes = ROOT.'/config/routes.php';
$loader = new Twig_Loader_Filesystem(['views/twig', 'views/ejs']);
$twig = new Twig_Environment($loader);
$twig->addGlobal('session', $_SESSION);
$router = new \App\Components\Router($routes);
$router->run();

