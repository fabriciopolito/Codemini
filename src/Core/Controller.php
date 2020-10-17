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
use \stdClass;

abstract class Controller{

    private static $instance;

    /**
	 * $viewDir
	 *
	 * Set curren path of Views. 
     * Default: '../app/Views/'
	 */
    private $viewDir = DIR_APP . 'Views/';

    /**
	 * $view
	 *
	 * An stdClass object for data manipulation purpose in Controllers/Views 
	 */
    public $view;

    /**
	 * Constructor
     * - Create object stdClass globally
	 * - Create object reference
	 * @access	public
	 */
    public function __construct(){
        self::$instance =& $this;
        $this->view = new \stdClass();
    }

    /**
	 * Return Controller object reference
	 *
	 * @param	none
	 * @return	object class reference
	 */
    public static function &getInstance()
	{
		return self::$instance;
	}

    /**
	 * Display files of Views
	 *
	 * @param	string view name
	 * @return	void
	 */
    public function view($view)
    {
        $configExt = configItem('view_extension');

        if(empty($configExt)){
            $configExt = '.php';
        }

        //if $view has extension then display original args without config view_extension
        $explicitExt = strrchr($view, '.');

        if($explicitExt != ""){
            $configExt = "";
        }

        if (is_readable($this->viewDir . $view . $configExt)) {
            require $this->viewDir . $view . $configExt;
        }else{
            throw new \Exception('The file ' . $this->viewDir . $view . $configExt . '  does not exists. Please create it.');
        }
    }

    /**
	 * Show 404 error page
	 *
	 * @param	none
	 * @return	null
	 */
    public static function setPageNotFound()
    {
        header('HTTP/1.0 404 Not Found');

        $configPage = configItem('page_not_found');

        $controllerMethod = explode("@", $configPage);

        $_controller = isset($controllerMethod[0]) ? $controllerMethod[0] : '';
        $_method = isset($controllerMethod[1]) ? $controllerMethod[1] : '';

        $class = NAMESPACE_CONTROLLER . ucfirst($_controller);
        
        if(file_exists(DIR_CONTROLLER . ucfirst($_controller) . '.php')){
            $controller = new $class;

            if(method_exists($controller, $_method)){
                $controller->$_method();
                return;
            }else{
                die('The method: ' . $_method . ' does not exists in ' . $class . '. Please create it.');
            }

        }else{
            die('The class: ' . $class . ' does not exists. Please create it.');
        }

    }

}