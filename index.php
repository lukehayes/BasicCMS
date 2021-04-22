<?php 
require 'vendor/autoload.php';

use Core\App;
use Core\Router;

$app = new App(new Router);
$app->run();
