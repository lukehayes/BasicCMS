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
        $this->data['title'] = "404 - Page not found";
        $this->data['errorCode'] = "404";
        $this->data['message'] = "That page could not be found.";
        $this->view->renderError("404", array_merge($this->data));
    }
}
