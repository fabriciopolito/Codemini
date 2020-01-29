<?php 

namespace App\Models;

use Codemini\Core\Model;

class Produtos extends Model{

    protected $table = 'tab_products';

    /**
     * Construct parent Model for get instance '$this->db'
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * Do your own code here... 
     * Custom the way you want
     * 
     * Use $db instance of PDO class and write yours query's
     * 
     * EX: $this->db->query('SELECT * FROM users')->fetch()
     *     $this->db->query('SELECT * FROM users')->fetchAll()
     */

    public function selectAll($orderBy = "ORDER BY `Name` ASC"){
        $sql = "SELECT `Id`, `Name`, `Price`, `Created`";
        $sql .= " FROM `{$this->table}` {$orderBy}";
        $query = $this->db->query($sql);
        return $query->fetchAll();
    }

    public function insert(){}
    public function delete(){}
    public function update(){}

}