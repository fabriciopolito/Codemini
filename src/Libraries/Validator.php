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
 *
 * <?php
 * namespace App\Controllers;
 *
 * use Codemini\Core\Controller;
 * use Codemini\Libraries\Validator;
 * use Codemini\Libraries\Input;
 *
 * class Login extends Controller{
 *
 *     public function __construct(){
 *         parent::__construct();
 *     }
 *
 *     public function acaoLogin()
 *     {
 *
 *         $email = Input::post('email');
 *         $senha = Input::post('senha');
 *
 *         // If you would like to change open and close tags
 *         Validator::setOpenTag('<small>');
 *         Validator::setCloseTag('<small><br>');
 *
 *         // Just call statics methods
 *         Validator::isEmail($email);
 *         Validator::required($senha, "senha");
 *
 *         // Check the errors
 *         if(Validator::getErrors() > 0) {
 *
 *             // Display errors
 *             echo Validator::getMsg();
 *             return;
 *         }
 *
 *     }
 *
 * }
 */

namespace Codemini\Libraries;

class Validator
{

	private static $_error = 0;
	private static $_msg;
	private static $tag_open = "<p>";
	private static $tag_close = "</p>";
	
	/**
	 * Return errors from methods
	 *
	 * @return interger
	 */
	public static function getErrors()
	{
		return self::$_error;
	}
	
	/**
	 * Return messages from methods
	 *
	 * @return string
	 */
	public static function getMsg()
	{
		$msg = "";
		foreach(self::$_msg as $key => $val) {
			$msg .= $val;
		}
		return $msg;
	}
	
	/**
	 * Set open html tag if you want
	 *
	 * @param  mixed $val
	 * @return void
	 */
	public static function setOpenTag($val) {
		self::$tag_open = $val;
	}

	/**
	 * Set close html tag if you want
	 *
	 * @param  mixed $val
	 * @return void
	 */
	public static function setCloseTag($val) {
		self::$tag_close = $val;
	}
	
	/**
	 * Check empty
	 *
	 * @param  mixed $var
	 * @param  mixed $label
	 * @return boolean
	 */
	public static function required($var, $label="")
	{
		if(empty($var)) {
			self::$_error++;
			self::$_msg[] = self::$tag_open . "O campo " . $label . " é obrigatório" . self::$tag_close;
			return false;
		}

		return true;
	}
	
	/**
	 * Check valid email
	 *
	 * @param  mixed $var
	 * @param  mixed $label
	 * @return boolean
	 */
	public static function isEmail($var, $label="E-mail")
	{
		if( ! self::required($var, $label)) {
			return false;
		}

		if( ! filter_var($var, FILTER_VALIDATE_EMAIL)) {
			self::$_error++;
			self::$_msg[] = self::$tag_open . "O campo " . $label . " não é um e-mail válido" . self::$tag_close;
			return false;
		}

		return true;
	}
	
	/**
	 * Check valid URL
	 *
	 * @param  mixed $var
	 * @param  mixed $label
	 * @return booelan
	 */
	public static function isUrl($var, $label="URL")
	{
		if( ! filter_var($var, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED)) {
			self::$_error++;
			self::$_msg[] = self::$tag_open . "O " . $label . " não é válido" . self::$tag_close;
			return false;
		}

		return true;
	}
	
	/**
	 * Check is float
	 *
	 * @param  mixed $var
	 * @param  mixed $label
	 * @return boolean
	 */
	public static function isFloat($var, $label="VALOR")
	{
		if( ! filter_var($var, FILTER_FLAG_ALLOW_THOUSAND)) {
			self::$_error++;
			self::$_msg[] = self::$tag_open . "O " . $label . " não é float" . self::$tag_close;
			return false;
		}

		return true;
	}
	
	/**
	 * Check is int
	 *
	 * @param  mixed $var
	 * @param  mixed $label
	 * @return boolean
	 */
	public static function isInt($var, $label="VALOR")
	{
		if( ! filter_var($var, FILTER_FLAG_ALLOW_OCTAL, FILTER_FLAG_ALLOW_HEX)) {
			self::$_error++;
			self::$_msg[] = self::$tag_open . "O " . $label . " não é inteiro" . self::$tag_close;
			return false;
		}

		return true;
	}
	
	/**
	 * Check is bool
	 *
	 * @param  mixed $var
	 * @param  mixed $label
	 * @return boolean
	 */
	public static function isBool($var, $label="VALOR")
	{
		if( ! filter_var($var, FILTER_VALIDATE_BOOLEAN)) {
			self::$_error++;
			self::$_msg[] = self::$tag_open . "O " . $label . " não é booleano" . self::$tag_close;
			return false;
		}

		return true;
	}
	
	/**
	 * Check is IP
	 *
	 * @param  mixed $var
	 * @param  mixed $label
	 * @return boolean
	 */
	public static function isIp($var, $label="VALOR")
	{
		if( ! filter_var($var, FILTER_VALIDATE_IP)) {
			self::$_error++;
			self::$_msg[] = self::$tag_open . "O " . $label . " não é um IP válido" . self::$tag_close;
			return false;
		}

		return true;
	}
	
	/**
	 * Custom regex
	 *
	 * @param  mixed $var
	 * @param  mixed $regex
	 * @param  mixed $label
	 * @return boolean
	 */
	public static function regex($var, $regex, $label="VALOR")
	{
		if(preg_match($regex, $var)){
			self::$_error++;
			self::$_msg[] = self::$tag_open . "O " . $label . " não é uma entrada válida" . self::$tag_close;
			return false;
		}

		return false;
	}

}