<?php 
namespace App\Controllers;

use Codemini\Core\Controller;

class Produtos extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index($args=""){
        $this->view->body = 'Produtos/index';
        $this->view('Template/index');
    }

}
	