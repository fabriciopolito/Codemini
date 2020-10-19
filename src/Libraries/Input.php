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
 * --------------------------------------------------------------------------
 * HOW TO USE?
 * --------------------------------------------------------------------------
 *<?php 
 *namespace App\Controllers;
 *
 *use Codemini\Core\Controller;
 *use Codemini\Libraries\Input;
 *
 *class Teste extends Controller{
 *
 *    public function __construct(){
 *        parent::__construct();
 *    }
 *
 *    public function index($args){
 *        //$_POST
 *        $email = Input::post('email');
 *        $password = Input::post('password');
 *       
 *        //$_GET
 *        $email = Input::get('email');
 *        $password = Input::get('password');
 *        
 *        //FILE
 *        $userfile = Input::file('userfile');
 *        
 *        //ALL REQUEST
 *        print_r($allRequest = Input::all());
 *    }
 *
 *}
 */

namespace Codemini\Libraries;

class Input
{	
	/**
	 * get
	 *
	 * @param  mixed $name
	 * @return mixed
	 */
	public static function get($name = null)
	{
		if(!$name) return $_GET;
		if(isset($_GET[$name])) return $_GET[$name];
		return false;
	}

	/**
	 * post
	 *
	 * @param  mixed $name
	 * @return mixed
	 */
	public static function post($name = null)
	{
		if(!$name) return $_POST;
		if(isset($_POST[$name])) return $_POST[$name];
		return false;
	}

	/**
	 * file
	 *
	 * @param  mixed $name
	 * @return mixed
	 */
	public static function file($name = null)
	{
		if(!$name) return $_FILES;
		if(isset($_FILES[$name])) return $_FILES[$name];
		return false;
	}

	/**
	 * all
	 *
	 * @param  mixed $name
	 * @return array $_REQUEST
	 */
	public static function all()
	{
		return $_REQUEST;
	}
}