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
     * pdo
     * 
     * @param none
     * @return void
     */
    public static function pdo(){

        try{

            /**
             * Set config connections ./app/Config.php
             */
            $config = configItem('mysql');
            
            $str = 'mysql:';
            $str .= 'host=' . $config['host'];
            $str .= ';dbname=' . $config['dbname'];
            $str .= ';charset=' . $config['charset'];

            $pdo = new \PDO($str, $config['username'], $config['password']);

            $pdo->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            /**
             * What type of default return data you want?
             *  PDO::FETCH_OBJ
             *  PDO::FETCH_ASSOC
             *  PDO::FETCH_BOTH
             * 
             * https://www.php.net/manual/pt_BR/pdostatement.fetch.php
             */
            $pdo->setAttribute (PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            return $pdo;

        }catch(PDOException $e){
            die('Database connection error: ' . $e->getMessage());
        }

    }

}