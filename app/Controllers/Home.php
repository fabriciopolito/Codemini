<?php 

namespace App\Controllers;

use Codemini\Core\Controller;

//Example purpose
//use App\Models\Example;

class Home extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index($args=""){
        
        /**
         * -----------------------------------------------------------------------
         * HOW TO USE DATA TO VIEWS
         * -----------------------------------------------------------------------
         * $this->view is an instance of stdClass and you can get it in Controller 
         * or file view
         * 
         * Example:
         *  Data to view: 
         *      $this->view->data = ['php', 'js', 'nodejs', 'mongodb', 'css'];
         * 
         * Sugest:
         *  Require parts of template to view:
         *      $this->view->body = 'Home/Menu';
         */

        /**
         * -----------------------------------------------------------------------
         * HOW TO USE MODEL?
         * -----------------------------------------------------------------------
         *  Example using model Example:
         * 
         *  $exampleModel = new \App\Models\Example();
         *  echo '<pre>';
         *  print_r($exampleModel->allProducts());
         *  echo '</pre>';
         *  return;
         */

        $this->view->body = 'Home/index';
        $this->view('Template/index');
    }

}