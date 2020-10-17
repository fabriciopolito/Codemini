<?php 
namespace App\Controllers;

use Codemini\Core\Controller;

class PageNotFound extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index($args=""){
        $this->view->body = 'Error/error404';
        $this->view('Template/index');
    }

}
	