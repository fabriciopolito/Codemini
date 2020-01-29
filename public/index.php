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
 * Run PHP Server or set Document root Apache here... 
 * Example for development purpose: php -S localhost:8080 and access your site in browser
 * 
 * Modify standards files:
 * 
 *  - Config.php - Define config to base_url, mysql and environment
 *  - Connection.php (not required)
 *  - Route.php - Define your own routes
 * 
 *  ... And create yours Controllers, Views and Models
 * 
 *      Just it !
 */

require_once '../vendor/autoload.php';

try {

    $myAPP = new App\Init;

} catch (Exception $e) {

    //Comment bellow to hidde errors to user's
    //Or implements a custom Log class
    //Or use a popular class like Monolog
    //example: composer require monolog/monolog
    $log = '<div style="border:1px solid red; color: red; padding:10px;  margin:15px; font:14px Tahoma">';
    $log .= 'Msg: ' . $e->getMessage() . '<br>';
    $log .= 'Line: ' . $e->getLine() . '<br>';
    $log .= 'File: ' . $e->getFile();
    $log .= '</div>';

    echo $log;

}

