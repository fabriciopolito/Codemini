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

$config['base_url'] = 'http://localhost:8080/';

//Show Errors, Warnings and info
$config['environment'] = 'development';

//Hidden Errors, Warnings and info
//$config['environment'] = 'production';

$config['mysql'] = [
    'host'     => 'localhost',
    'dbname'   => 'codemini_tests',
    'username' => 'root',
    'password' => '',
    'charset'  => 'utf8'
];