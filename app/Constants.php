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

/**
 * General purposes
 */
defined('PROJECT_NAME')  OR define('PROJECT_NAME', 'Nome do meu projeto.');
defined('PROJECT_NAME_WITH_LINKS')  OR define('PROJECT_NAME_WITH_LINKS', 'Nome do meu projeto. <a href="" target="_blank">Link</a>.');

/**
 * Files location
 */
defined('DIR_VENDOR') OR define('DIR_VENDOR', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR);
defined('DIR_CORE') OR define('DIR_CORE', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Core' . DIRECTORY_SEPARATOR);
defined('DIR_APP') OR define('DIR_APP', dirname(__FILE__) . DIRECTORY_SEPARATOR);
defined('DIR_VIEW') OR define('DIR_VIEW', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);
defined('DIR_CONTROLLER') OR define('DIR_CONTROLLER', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR);
defined('DIR_MODEL') OR define('DIR_MODEL', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR);

/**
 * Namespaces
 */
defined('NAMESPACE_CONTROLLER') OR define('NAMESPACE_CONTROLLER', "App\\Controllers\\");