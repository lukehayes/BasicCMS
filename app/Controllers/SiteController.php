<?php 
namespace App\Controllers; 

use Core\Controller;

/**
 * SiteController
 */
class SiteController extends Controller
{
    public function index()
    {
        $this->view->render("index");
    }
}
