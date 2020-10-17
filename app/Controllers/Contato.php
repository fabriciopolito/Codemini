<?php 
namespace App\Controllers;

use Codemini\Core\Controller;

class Contato extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index($args=""){
        $this->view->body = 'Contato/index';
        $this->view('Template/index');
    }

}
	