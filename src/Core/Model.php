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
	 * Set protected $db variable for custom Models in app/Models
	 */
    protected $db;

    public function __construct(){
        $this->db = Connection::pdo();
    }

}