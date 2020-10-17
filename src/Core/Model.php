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

namespace Codemini\Core;

use App\Connection;

abstract class Model{

    /**
	 * $db
	 *
	 * Set protected $db variable for Models in app/Models
	 */
	protected $db;
	
	/**
	 * PDOStatement object
	 */
    protected $stmt;

	public function __construct()
	{
        $this->db = Connection::pdo();
    }
    
    /**
     * bind
     *
     * @param  mixed $param
     * @param  mixed $value
     * @param  mixed $type
     * @return void
     */
    public function bind($param, $value, $type = null)
	{
	    try{
			if (is_null($type)) 
			{
				switch (true) 
				{
					case is_int($value):
						$type = \PDO::PARAM_INT;
						break;
					case is_bool($value):
						$type = \PDO::PARAM_BOOL;
						break;
					case is_null($value):
						$type = \PDO::PARAM_NULL;
						break;
					default:
						$type = \PDO::PARAM_STR;
				}
			}
			
			$this->stmt->bindParam($param, $value, $type);
		} catch(\PDOException $e) {
			$this->debug($e);
		}
    }
        
    /**
     * query
     *
     * @param  mixed $query
     * @return void
     */
    public function query($query)
	{
		try {
			$this->stmt = $this->db->prepare($query);
		} catch (\PDOException $e) {
			$this->debug($e);
		}
	}
	
	/**
	 * execute
	 *
	 * @param  mixed $param
	 * @return void
	 */
	public function execute($param = null)
	{
		try{
			if($this->stmt->execute($param)) {
                return true;
            }else{
				return false;
			}
		} catch (\PDOException $e) {
			$this->debug($e);
		}
	}

	 /**
	 * @param 	object PDO - possible values: PDO::FETCH_ASSOC | PDO::FETCH_OBJ | PDO::FETCH_BOTH
	 * @return 	object Array
	 */
	public function fetch($f = null)
	{
		try {
			return $this->stmt->fetch($f);
		} catch (\PDOException $e) {
			$this->debug($e);
		}
	}

	/**
	 * @param 	object PDO - possible values: PDO::FETCH_ASSOC | PDO::FETCH_OBJ | PDO::FETCH_BOTH
	 * @return 	object Array
	 */
	public function fetchAll($f = null)
	{
		try {
			return $this->stmt->fetchAll($f);
		} catch (\PDOException $e) {
			$this->debug($e);
		}
	}
	
	/**
	 * count
	 *
	 * @return integer
	 */
	public function count()
	{
	    try {
			return $this->stmt->rowCount();
		} catch (\PDOException $e) {
			$this->debug($e);
		}
	}
	
	/**
	 * lastInsertId
	 *
	 * @return integer
	 */
	public function lastInsertId()
	{
		try {
			return $this->db->lastInsertId();
		} catch (\PDOException $e) {
			$this->debug($e);
		}
	}
	
	/**
	 * beginTransaction
	 *
	 * @return boolean
	 */
	public function beginTransaction()
	{
		try {
			return $this->db->beginTransaction();
		} catch (\PDOException $e) {
			$this->debug($e);
		}
	}
	
	/**
	 * endTransaction
	 *
	 * @return boolean
	 */
	public function endTransaction()
	{
		try {
			return $this->db->commit();
		} catch (\PDOException $e) {
			$this->debug($e);
		}
	}
	
	/**
	 * cancelTransaction
	 *
	 * @return boolean
	 */
	public function cancelTransaction()
	{
		try {
			return $this->db->rollBack();
		} catch (\PDOException $e) {
			$this->debug($e);
		}
	}
	
	/**
	 * debugDumpParams
	 *
	 * @return void
	 */
	public function debugDumpParams()
	{
	    return $this->stmt->debugDumpParams();
	}
	
	/**
	 * debug
	 *
	 * @param  mixed $e
	 * @param  mixed $query
	 * @return void
	 */
	public function debug($e)
	{
		$config = configItem('mysql');

		if($config['display_error'] == true) {
			echo "SQL Error: " . $e->getMessage() . "\n\n";
			echo "----------------------------------------------------------------------------------------\n\n";
			echo $this->debugDumpParams();
		}
	}

}