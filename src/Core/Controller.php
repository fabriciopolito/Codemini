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

    /**
	 * $viewDir
	 *
	 * Set curren path of Views. 
     * Default: '../app/Views/'
	 */
    protected $viewDir = '../app/Views/';

    /**
	 * $view
	 *
	 * An stdClass object for data manipulation purpose in Controllers 
	 */
    protected $view;

    /**
	 * Constructor
     * - Create object stdClass globally
	 *
	 * @access	public
	 */
    public function __construct(){
        $this->view = new \stdClass();
    }

    /**
	 * Render element for display HTML to views
	 *
	 * @param	string template name
	 * @return	void
	 */
    public function render($template){

        require '../app/Config.php';

        if (file_exists($this->viewDir . $template . '.phtml')) {
            require_once $this->viewDir . $template . '.phtml';
        }else{
            throw new \Exception('The file ' . $this->viewDir . $template . '.phtml  does not exists. Please create it.');
        }
    }

}