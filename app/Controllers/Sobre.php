<?php 
namespace App\Controllers;

use Codemini\Core\Controller;

class Sobre extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index($args=""){
        $this->view->body = 'Sobre/index';
        $this->view('Template/index');
    }

}
	