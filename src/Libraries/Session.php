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
 * <?php
 * namespace App\Controllers;
 * 
 * use Codemini\Libraries\Session;
 * 
 * class Login extends Controller {
 * 
 * public function __construct()
 * {
 *      //Required to start session_start()
 *      Session::start(); 
 * 
 *      if(! Session::has('logged_in')){
 *         exit('You are not logged in!');
 *      }
 * }
 * 
 * public function actionLogin()
 * {
 *      //Set new session with array data
 *      Session::set(array(
 *          'user_name' => '',
 *          'user_email' => '',
 *          'user_last_access' => '',
 *          'user_id' => 0,
 *          'logged_in' => true
 *      ));
 * 
 *      // OR set new session with string data
 *      Session::set('user_name', 'Name User');
 *      Session::set('user_email', 'user@user');
 * }
 * 
 * }
 * 
 */

namespace Codemini\Libraries;

class Session
{    
    /**
     * start session with your defined session name
     *
     * @return void
     */
    public static function start()
    {
		if (! empty(configItem('session_name'))) {
            session_name(configItem('session_name'));
        }

		if (session_id() == '') {
			session_start();
        }
    }
    
    /**
     * Set a new session data
     *
     * @param  mixed $val
     * @param  mixed $newval
     * @return void
     */
    public static function set($val = array(), $newval = '') {
        if (is_string($val)) {
            $val = array($val => $newval);
        }

        if (count($val) > 0) {
            foreach ($val as $key => $val) {
                $_SESSION[$key] = $val;
			}
		}
    }
	
	/**
	 * Return specified session name
	 *
	 * @param  mixed $key
	 * @return mixed
	 */
	public static function get($key) 
    {
        if(isset($_SESSION[$key])) return $_SESSION[$key];
        return false;
	}
	
	/**
	 * Check if the session key exists
	 *
	 * @param  mixed $key
	 * @return boolean
	 */
	public static function has($key) 
    {
        if(isset($_SESSION[$key])) return true;
        return false;
	}
	
	/**
	 * Return all session data
	 *
	 * @return array
	 */
	public static function all() 
	{
        return (isset($_SESSION) ? $_SESSION : array());
    }
	
	/**
	 * Return session id
	 *
	 * @return mixed
	 */
	public static function id() 
    {
	    return session_id();
	}
		
	/**
	 * Regenerate new session id
	 *
	 * @return void
	 */
	public static function regenerateId() {
        // Copy old session data and session id
        $old_sess_id = session_id();
        $old_sess_data = isset($_SESSION) ? $_SESSION : array();

        // Regenerate session id and set $new_sess_id
        session_regenerate_id();
        $new_sess_id = session_id();

        // Check if old session exists and destroy
        if (session_id($old_sess_id)) {
            session_destroy();
        }

        // Switch back to the new session
        if ($new_sess_id) {
            session_id($new_sess_id);
            session_start();

            // Restore the old session data into the new session
            $_SESSION = $old_sess_data;
        }

        session_write_close();
    }
	
	/**
	 * Remove specified session name
	 *
	 * @param  mixed $key
	 * @return boolean
	 */
	public static function remove($key) 
    {
	    if(isset($_SESSION[$key])) {
	    	unset($_SESSION[$key]);
	    	return true;
	    } else {
	    	return false;
	    }
	}
	
	/**
	 * Remove all session
	 *
	 * @return boolean
	 */
	public static function destroy() 
    {
		if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 42000, '/');
        }

	    if(isset($_SESSION)) {
			$_SESSION = array();
	    	unset($_SESSION);
	    	return session_destroy();
	    } else {
	    	return false;
	    }
	}
}