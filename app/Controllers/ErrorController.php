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
        $this->data['title'] = "Error: 404.";
        $this->view->render("error/404", array_merge($this->data));
    }
}
