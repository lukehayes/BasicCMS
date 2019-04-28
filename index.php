<?php 
require 'vendor/autoload.php';

use Core\Controller;
use Core\View;

$c = new Controller();
$v = new View("index");

$v->render();
