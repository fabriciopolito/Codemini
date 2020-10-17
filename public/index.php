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
 * Welcome to Codemini Framework ! 
 * 
 * To run your project is very simple.
 * 
 * ----------------------------------------------------------------------------------------------------------------------
 * 1º method with cli-tools:
 * ----------------------------------------------------------------------------------------------------------------------
 * Example: php cli-tools serve
 * 
 *      Note: the cli-tools automatically will indentify if you are using index.php in a public folder or root project.
 *      Note: php cli-tools help will display a list of commands
 * 
 * ----------------------------------------------------------------------------------------------------------------------
 * 2º method with PHP built-in web server
 * ----------------------------------------------------------------------------------------------------------------------
 * 
 * Go to public folder and run PHP built-in web server.
 * 
 * Example: php -S localhost:8080 
 * and access your site http://localhost:8080
 * 
 * ----------------------------------------------------------------------------------------------------------------------
 * 3º method with WAMP or XAMPP
 * ----------------------------------------------------------------------------------------------------------------------
 * 
 * Example with WAMP: 
 *  1. Copy project folder into www
 *  2. Copy index.php and .htaccess from public folder into root folder 
 *  3. Set the $config['app_project_uri'] with the name of subfolfer. Example: www/projects/myproject then set $config['app_project_uri'] = 'projects/myproject';
 *  4. Remove public folder and all thing going to work well
 * 
 * ----------------------------------------------------------------------------------------------------------------------
 * 
 * Modify standards files:
 * 
 *  - ./app/Config.php - Define config to base_url, mysql and environment, etc
 *  - ./app/Constants.php - Define your project name, files location
 * 
 *  ... And create yours Controllers, Views and Models manually OR use cli-tools, example:
 * 
 *      php clit-tools help - Display list of commands
 *      php cli-tools create-controller Home
 *      php cli-tools create-model Home
 * 
 */

$dirname = strtolower(basename(__DIR__));

if($dirname == 'public') {
    require_once '../app/Init.php';
} else {
    require_once 'app/Init.php';
}

try {

    $myAPP = new Init();

} catch (Exception $e) {

    /**
     * ------------------------------------------------------------
     * Remove/comment the code below for hide errors to user
     * ------------------------------------------------------------
     * 
     * If your config $config['enviroment'] is different from 'development'
     * then the page not found will be display instead
     * 
     * Set the values in ./app/Config.php
     */

    echo '
    <!DOCTYPE html>
    <html lang="pt-br">  
    <head>
        <meta charset="utf-8" />
        <title>Error!</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">  
        <style>
        body{
			font-family: Arial, Helvetica, sans-serif;
			font-size: 14px;
        }
        h1{
            font-size:18px; 
            font-weight:bold; 
            margin-bottom:10px;
            margin-top:0px;
        }
		.error {
			border: 1px solid;
			margin: 10px 0px;
			padding: 15px 10px 15px 50px;
			background-repeat: no-repeat;
			background-position: 10px center;
			color: #D8000C;
			background-color: #FFBABA;
			background-image: url(\'https://i.imgur.com/GnyDvKN.png\');
		}
        </style>
    <body>
        <div class="error">
            <h1>Error!</h1>
            <strong>Msg:</strong> '.$e->getMessage().' <br>
            <strong>Line:</strong> '.$e->getLine().' <br>
            <strong>File:</strong> '.$e->getFile().'
        </div>
';

} //end try...catch

