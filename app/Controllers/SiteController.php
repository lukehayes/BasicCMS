<?php 
namespace App\Controllers; 

use Core\Controller;

/**
 * SiteController
 */
class SiteController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['name'] = "Index";

        $this->view->render("index", array_merge($this->data, $data));
    }

    public function hello()
    {
        $data['name'] = "Hello";

        $this->view->render("index", array_merge($this->data, $data));
    }
}
