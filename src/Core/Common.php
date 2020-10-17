<?php 

/**
 * Codemini Framework
 * CodeIgniter Framework
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

class Common
{
	/**
    * Loads the main Config.php file
    *
    * @access	public
    * @return	array
    */
    public static function &getConfig()
	{
        static $_config;
        
        if (isset($_config))
		{
			return $_config[0];
		}

		if (file_exists(DIR_APP . 'Config.php')) {
            require DIR_APP . 'Config.php';
        } else {
            exit('The file '.DIR_APP.'Config.php does not exists. Please create it in ./app/ and assign array values.');
        }

		// Does the $config array exist in the file?
		if ( ! isset($config) OR ! is_array($config))
		{
            exit('Your config file does not appear to be formatted correctly.');
		}

		$_config[0] =& $config;
		return $_config[0];
	}

// ------------------------------------------------------------------------

    /**
    * Returns the specified config item
    *
    * @access	public
    * @return	mixed
    */
    
    public static function configItem($item)
    {
        static $_config_item = array();

        if ( ! isset($_config_item[$item]))
        {
            $config =& self::getConfig();

            if ( ! isset($config[$item]))
            {
                return FALSE;
            }
            $_config_item[$item] = $config[$item];
        }

        return $_config_item[$item];
    }
    
}