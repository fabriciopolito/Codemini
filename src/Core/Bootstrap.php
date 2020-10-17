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

namespace Codemini\Core;

use \Exception;

const CODEMINI_VERSION = 'v1.0';

abstract class Bootstrap{
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(){
        $this->run();
    }

    /**
	 * Create Controller and methods according request URI
	 *
	 * @param	none
	 * @return	void
	 */
    protected function run(){

        /**
         * Required for construct parts of URI and sets statics variables
         */
        Request::start();

        //can be empty if there is not a subdirectory in ./App/Controllers
        $_directoryController = Request::getDirectoryController();
        $_controller = Request::getController();
        $_method = Request::getMethod();
        $_args = Request::getArgs();

        //The file class with namespace
        $class = NAMESPACE_CONTROLLER . (!empty($_directoryController) ? $_directoryController . "\\" : "") . $_controller;

        //The file with directory separator
        $_directoryController = (!empty($_directoryController) ? $_directoryController . DIRECTORY_SEPARATOR : "");

        // Check if controller and methods exists,
        // then instance the object Controller
        if(file_exists(DIR_CONTROLLER . $_directoryController . $_controller . '.php')){
           
            $controller = new $class; 

            if(method_exists($controller, $_method)){
                $controller->$_method($_args);
                return;
            }else{
                if(configItem('environment') == 'development')
                    throw new \Exception('The method: ' . $_method . ' does not exists in ' . $class . '. Please create it.');
                else
                    Controller::setPageNotFound();
            }

        }else{
            if(configItem('environment') == 'development')
                throw new \Exception('The class: ' . $class . ' does not exists. Please create it.');
            else
                Controller::setPageNotFound();
        }

    }

    

}