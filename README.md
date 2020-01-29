![Codemini](http://www.integraweb.com.br/codemini.png)

# Codemini
Mini framework PHP for small applications - Create fastly website or system with standard MVC structure

## Requirements

- Codemini works with PHP 5.4+.

## Installation

**With Composer creating project**

**1 -** If you want to install as composer project, run: `composer create-project --prefer-dist codemini/framework name-folder-of-you-project`  

**2 -** Go to `public` folder and start PHP Server `php -S localhost:8080` 

**With Github**

**1 -** If you want to install with **Git clone**, run: `git clone https://github.com/fabriciopolito/Codemini.git` or download "Download ZIP" and extract files.

**2 -** Run **Composer (required)** in root project folder where contain **composer.json** to create **autoload files**.

If you have installed Composer globally:  `composer install`  
If you have composer.phar: `php composer.phar install`

**3 -** Go to `public` folder and start PHP Server `php -S localhost:8080` 

Your index.php in document root must looks like this:

```php
require_once '../vendor/autoload.php';

try {

    $myAPP = new App\Init;

} catch (Exception $e) {

    //Comment bellow to hidde errors to user's
    //Or implements a custom Log class
    //Or use a popular class like Monolog
    //example: composer require monolog/monolog
    $log = '<div style="border:1px solid red; color: red; padding:10px;  margin:15px; font:14px Tahoma">';
    $log .= 'Msg: ' . $e->getMessage() . '<br>';
    $log .= 'Line: ' . $e->getLine() . '<br>';
    $log .= 'File: ' . $e->getFile();
    $log .= '</div>';

    echo $log;

}
```

---

**Modify standards files:**

 - **Config.php** - Define config to base_url, mysql and environment
 - **Route.php** - Define your own routes
 - **Connection.php** (not required)

 ... and create yours Controllers, Views and Models !
  
### Creating Controller

Controllers / `Home.php`
 
 ```php
<?php 

namespace App\Controllers;

use Codemini\Core\Controller;

class Home extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){

        //Data to view
        //Example: $this->view->data = ['php', 'js', 'nodejs', 'mongodb', 'css'];

        $this->view->body = 'Home/Index';
        $this->render('Template/Index');
    }

}
```
 
### Creating Views

Views / `Template/index.phtml`
 
 ```html
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <base href="<?php echo $config['base_url'] ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <title>System or Site name</title>
  </head>
  <body>
  
	<?php 
		print '<pre>';
			print_r($this->view->data);
		print '</pre>';
	?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>
```

### Creating Models

Models / `Produtos.php`
 
 ```php
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
```

 Just it ! 
 
### Author

Fabricio Pólito - <fabriciopolito@gmail.com> - <https://github.com/fabriciopolito>

### License

Codemini is licensed under the MIT License
