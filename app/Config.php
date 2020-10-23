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
 * --------------------------------------------------------------------------------
 * How to get config item in any part of the code?
 * Just use global function configItem('key')
 *
 * Example: if(configItem('environment') == 'development') do something
 * Example: <?=configItem('base_url') ?>
 * ---------------------------------------------------------------------------------
 */

/**
 * The base url of you project
 */
$config['base_url'] = 'http://localhost:8080/';

/**
 * Possible values: development, production
 */
$config['environment'] = 'development';

/**
 * MySQl Connection
 */
$config['mysql'] = [
    'host'     => 'localhost',
    'dbname'   => 'codemini_tests',
    'username' => 'root',
    'password' => '',
    'charset'  => 'utf8',
    'display_error' => ($config['environment'] == 'development') ? true : false
];

/**
 * If you would like set the name session for security reason
 */
$config['session_name'] = 'MY_Session_name_';

/**
 * Set timezone
 * https://www.php.net/manual/pt_BR/timezones.php
 */
$config['timezone'] = 'America/Sao_Paulo';

/**
 * Page Not Found - if environment variable different from development it will 
 * display else the exception will display.
 * 
 * Format: Controller@Method
 */
$config['page_not_found'] = 'PageNotFound@index';

/**
 * File extension for files in View directory
 * 
 * Note: if blank, .php will be required OR you can specified complete name in
 * view function
 * 
 * Example: $this->view('home/index.tpl')
 */
$config['view_extension'] = '.phtml';

