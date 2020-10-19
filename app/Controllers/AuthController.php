<?php 

namespace App\Controllers;

use Codemini\Core\Controller;
use Codemini\Libraries\Redirect;
use Codemini\Libraries\Session;

class AuthController extends Controller{

    public function __construct(){
        parent::__construct();

        Session::start();

        //See more options at Session library in ./src/Libraries/Session.php
        if(! Session::has('logged_in')){

            exit('You are not logged in!');

           //Redirect::to(configItem('base_url') . 'login/index');
           //exit();
        }

    }

}