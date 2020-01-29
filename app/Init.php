<?php 

/**
 * Codemini Framework
 *
 * An open source application development small framework
 *
 * @package		Codemini Framework
 * @author		Fabricio Polito <fabriciopolito@gmail.com>
 * @copyright	Copyright (c) 2020 - 2020.
 * @license		https://github.com/fabriciopolito/Codemini/blob/master/LICENSE
 * @link		https://github.com/fabriciopolito/Codemini
 * @since		Version 1.0
 */

/** ===========================================================================
 * Do not modified below
 * Use it for instance a new website in public directory index.php
 * Ex: $init = $init = new App\Init;
 */
namespace App;

use Codemini\Core\Bootstrap;

class Init extends Bootstrap{

    public function __construct(){
        
        if (file_exists('../app/Config.php')) {
            require '../app/Config.php';
        } else {
            throw new \Exception('The file Config.php does not exists. Please create it in app/ and assign values.');
        }

        if($config['environment'] == 'development'){
            error_reporting(E_ALL);
            ini_set("error_reporting", E_ALL);
        }else{
            error_reporting(0);
            ini_set("error_reporting", 0);
        }
        
        /**
         * Codemini run...
         */
        parent::__construct();

    }

}