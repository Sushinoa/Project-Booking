<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

require_once (__DIR__. '/vendor/autoload.php');

$twig = new Twig_Environment(new Twig_Loader_Filesystem('views/twig'));
$twig->display('dev.twig');