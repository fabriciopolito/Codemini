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
	 * Routes object
	 *
	 * Object $routes for use all methods of class
	 */
    private $routes = [];

    /**
	 * Constructor
	 *
	 * @access	public
	 */
    public function __construct(){
        $this->run();
    }

    /**
	 * Get routes
	 *
	 * @param 	none
	 * @return 	object Array
	 */
    public function getRoutes(){

        if(file_exists('../app/Route.php')){
            require_once '../app/Route.php';
        }else{
            throw new \Exception('The file Route.php does not exists. Please create it in app/ and assign to $routes variable. Ex: $routes[\'home\'] = [\'route\', \'controller\', \'method\']');
        }
        
        $this->routes = $routes;
        return $this->routes;
    }

    /**
	 * Create Controller and methods according url active
	 *
	 * @param	none
	 * @return	void
	 */
    protected function run(){

        $active_url = $this->getURL();

        foreach($this->getRoutes() as $path => $route){

            if($active_url == $route['route']){
                
                $class = "App\\Controllers\\" . ucfirst($route['controller']);
                $method = $route['method'];

                if(file_exists('../app/Controllers/' . ucfirst($route['controller']) . '.php')){
                    $controller = new $class; 
                }else{
                    throw new \Exception('The class: ' . $class . ' does not exists. Please create it.');
                }
                
                if(method_exists($controller, $method)){
                    $controller->$method();
                    return;
                }else{
                    throw new \Exception('The method: ' . $method . ' does not exists in ' . $class . '. Please create it.');
                }

                break;
            }
            
        }

        //if not exists route then show 404
        header('HTTP/1.0 404 Not Found');
        echo 'Not found a route! 404<br>';
        echo 'Custom this page if you want!';
        
    }

    /**
	 * Get active URL
	 *
	 * @param	none
	 * @return	string of url
	 */
    protected function getURL(){
        
        if(empty($_SERVER['REQUEST_URI'])){
            throw new \Exception('REQUEST_URI string not exists.');
        }

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = str_replace('/index.php', '', $uri);

        //if blank or '/', then return '/' ... if not remove last '/'
        //Ex: it is valid: localhost:8080/home or localhost:8080/home/
        $uri = ($uri == '' || $uri == '/') ? '/' : rtrim($uri, '/');
        
        return $uri;
    }

}