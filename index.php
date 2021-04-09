<?php 
require 'vendor/autoload.php';

use Core\App;
use Core\Router;

$r = new Router();

$r->get('/hello', 'SiteController','index');
$r->get('/other', 'SiteController','other');
$r->post('/other', 'SiteController','other');

dump($r->routes());


