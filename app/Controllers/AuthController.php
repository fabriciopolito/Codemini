<?php 

namespace App\Controllers;

use App\Libraries\Redirect;
use Codemini\Core\Controller;
use App\Libraries\Session;

class AuthController extends Controller{

    public function __construct(){
        parent::__construct();

        Session::start();

        //See more options at Session library in ./app/Libraries/Session.php
        if(! Session::has('logged_in')){
           Redirect::to(configItem('base_url') . 'login/index');
           exit();
        }

    }

}