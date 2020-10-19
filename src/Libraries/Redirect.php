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

namespace Codemini\Libraries;

class Redirect
{	
	/**
	 * Redirect to specified location
	 *
	 * @param  mixed $url
	 * @return void
	 */
	public static function to($url)
	{
		header('Location: '.$url);
		exit();
	}
}