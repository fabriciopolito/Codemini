<?php 

namespace App\Controllers;

use Codemini\Core\Controller;

//Uncomment bellow to use Model example 
//use App\Models\Produtos as produto_model;

class Produtos extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        
        //Example Model usage

        /**
            $prod = new produto_model();
            $this->view->data = $prod->selectAll();

            //Example data to view
            print '<pre>';
            print_r($this->view->data);
            print '</pre>';
         */

        $this->view->body = 'Produtos/index';
        $this->render('Template/index');
    }

}