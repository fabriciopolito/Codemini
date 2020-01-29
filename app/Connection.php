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

namespace App;

use \PDO;
use \PDOException;

class Connection{

    /**
	 * PDO MySQL
	 *
	 * @param	none 
	 * @return	object PDO connection
	 */
    public static function pdo(){

        include 'Config.php';

        try{

            $str = 'mysql:';
            $str .= 'host=' . $config['mysql']['host'];
            $str .= ';dbname=' . $config['mysql']['dbname'];
            $str .= ';charset=' . $config['mysql']['charset'];

            $pdo = new \PDO($str, $config['mysql']['username'], $config['mysql']['password']);
            $pdo->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute (PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $pdo;

        }catch(PDOException $e){
            echo 'Databse connection error: ' . $e->getMessage();
        }

    }

}