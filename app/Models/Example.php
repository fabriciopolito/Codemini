<?php 
namespace App\Models;

use Codemini\Core\Model;

class Example extends Model{

    protected $table = 'tab_products';

    /**
     * Construct parent model class for get instance '$this->db' and the 
     * SIMPLE QUERY BUILDER functions
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Example 1 with VERY SIMPLE query builder
     */
    public function allProducts($orderBy = "ORDER BY `name` ASC"){
        $sql = "SELECT * FROM `{$this->table}` {$orderBy}";
        $this->query($sql);
        $this->execute();
        return $this->fetchAll();
    }

    /**
     * Example 2 with VERY SIMPLE query builder
     */
    public function productById($val)
    {
        $sql = "SELECT * FROM `{$this->table}` WHERE `id` = :id";
        $this->query($sql);
        $this->bind(":id", $val);
        $this->execute();
        return $this->fetch();
    }

    /**
     * Example 3 with VERY SIMPLE query builder
     */
    public function productsByPrice($val)
    {
        $sql = "SELECT * FROM `{$this->table}` WHERE `price` = :price";
        $this->query($sql);
        $this->execute([":price" => $val]);
        return $this->fetchAll();
    }

    /**
     * Example 4 with MANUALLY statement $db
     */
    public function productsByName($val)
    {
        $sql = "SELECT * FROM `{$this->table}` WHERE `name` = :name";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":name", $val, \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }
}