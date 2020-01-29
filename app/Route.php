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

// Example: 
// $routes['home'] = [
//     'route' => '/',
//     'controller' => 'Home',
//     'method' => 'Index'
// ];

$routes['home'] = [
    'route' => '/',
    'controller' => 'Home',
    'method' => 'index'
];
$routes['sobre'] = [
    'route' => '/sobre',
    'controller' => 'Sobre',
    'method' => 'index'
];
$routes['produtos'] = [
    'route' => '/produtos',
    'controller' => 'Produtos',
    'method' => 'index'
];
$routes['servicos'] = [
    'route' => '/servicos',
    'controller' => 'Servicos',
    'method' => 'index'
];
$routes['contato'] = [
    'route' => '/contato',
    'controller' => 'Contato',
    'method' => 'index'
];
$routes['contato_enviar'] = [
    'route' => '/contato/enviar',
    'controller' => 'Contato',
    'method' => 'enviar'
];