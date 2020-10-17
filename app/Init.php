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
 * ---------------------------------------------------------------------------
 * DO NOT MODIFIED BELOW!!!
 * 
 * Use this class for instance a new website in public directory with index.php file
 * Example: $init = new Init();
 */

// Check Version
if (version_compare(phpversion(), '5.4.0', '<') == true) {
    exit('PHP5.4+ Required');
}

/**
 * The required files must have that order: 
 *  Constants.php
 *  Common.php
 *  autoload.php
 */
require 'Constants.php';
require DIR_CORE . 'Common.php';
require_once DIR_VENDOR . 'autoload.php';

/**
 * Change in ./app/Config.php
 */
date_default_timezone_set(configItem('timezone'));

/**
 * Returns the specified config item
 */
function configItem($item)
{
    return Common::configItem($item);
}

/**
 * Application Environment
 * Change in ./app/Config.php
 */
if(configItem('environment') == 'development'){
    error_reporting(E_ALL);
    ini_set("error_reporting", E_ALL);
}else{
    error_reporting(0);
    ini_set("error_reporting", 0);
}

use Codemini\Core\Bootstrap;
use Codemini\Core\Controller;

/**
 * Function to get Controller object instance
 */
function &getInstance()
{
    return Controller::getInstance();
}

class Init extends Bootstrap{

    public function __construct(){

        /**
         * Codemini run...
         */
        parent::__construct();

    }

}