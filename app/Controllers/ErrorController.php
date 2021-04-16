<?php 
namespace App\Controllers; 

use Core\Controller;

/**
 * SiteController
 */
class ErrorController extends Controller
{
    public function index()
    {
        echo "Error on CLASS:" . __CLASS__;
    }
}
