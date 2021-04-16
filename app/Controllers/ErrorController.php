<?php 
namespace App\Controllers; 

use Core\Controller;

/**
 * SiteController
 */
class ErrorController extends Controller
{
    public function index(string $error="404.")
    {
        echo $error;
    }
}
