<?php 

namespace App\Controllers;

use Codemini\Core\Controller;

class Home extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        
        //Data to view
        //Example: $this->view->data = ['php', 'js', 'nodejs', 'mongodb', 'css'];

        $this->view->body = 'Home/index';
        $this->render('Template/index');
    }

}