![Codemini](https://i.ibb.co/DpZpBjB/codemini.png)

# Codemini
Mini PHP framework - Create quickly application with standard MVC structure.

*Leia na versão em português (pt-BR): [Português pt-BR](README.pt-br.md)*

**Why use Codemini?**

If you don't want to use a complex structure due to any reasons and don't want being tied down it, so Codemini is option for you.

Codemini is very simple to use, you can run your projet in `public` folder like Laravel, CodeIgniter 4 or if you are using shared host, just copy `index.php` and `.htaccess` from public folder into root folder and all things going to work well.

You can use easily other packages from Packagist.org into your project, just run `composer require <vendor>/<package>` and Codemini will understanding all packages that you have installed.

**Third party tools like WAMP or XAMPP**

As i sad above, if you are using shared host or using tools like WAMP or XAMPP, just copy `index.php` and `.htaccess` from public folder into root folder and all things going to work well.

**Example:**

1. Copy your project folder into `www` or `htdocs`
2. Copy `index.php` and `.htaccess` from public folder into root folder

> **Note:** Remove public folder if you want

**Why do it?**

Because when you are using tools like WAMP or XAMPP, the DocumentRoot of Apache is point to root folder www (WAMP) or htdocs (XAMPP) and not to public folder of framework.

This rule is valid not only for Codemini but CodeIgniter 4, Laravel etc. It is the way the frameworks works.

## Requirements

- Codemini works with PHP 5.4+. :heavy_check_mark:

## Project structure

- cli-tools
- codemini_tests.sql
- composer.json
- LICENSE
- **app/**
	- Controllers/
	- Models/
	- Views/
	- Config.php
	- Constants.php
	- Connection.php
	- Init.php
- **public/**
	- .htaccess
	- index.php
- **src/**
	- Core/
		- Bootstrap.php
		- Common.php
		- Controller.php
		- Model.php
		- Request.php
	- Libraries/
		- Input.php
		- Redirect.php
		- Session.php
		- Validator.php

## Installation

#### With Composer Creating Project

**1 -** If you want to install as composer project, run: `composer create-project --prefer-dist codemini/framework name-folder-of-you-project`  

**2 -** Open terminal and run cli-tools: `php cli-tools serve`

**Optional:** Run with PHP built-in server, go to `public` folder and run: `php -S localhost:8080`

> **Note:** In this case it is not necessary to run composer install because the composer create-project already do it for you.

#### With Github

**1 -** If you want to install with **Git clone**, run: `git clone https://github.com/fabriciopolito/Codemini.git` or download "Download ZIP" and extract files.

**2 -** Run **Composer (required)** in root project folder where contain **composer.json** to create **autoload files**.

- If you have installed Composer globally:  `composer install`  
- If you have composer.phar: `php composer.phar install`

**3 -** Open terminal and run cli-tools: `php cli-tools serve`

**Optional:** Run with PHP built-in server, go to `public` folder and run: `php -S localhost:8080`

---

Your index.php should looks like this:

```php
<?php

$dirname = strtolower(basename(__DIR__));

if($dirname == 'public') {
    require_once '../app/Init.php';
} else {
    require_once 'app/Init.php';
}

try {

    $myAPP = new Init();

} catch (Exception $e) {

    $e->getMessage();

} //end try...catch
```

## Configuration

> **Note:** Codemini does not has many configurations.

**Modify standards files:**

 - **app / `Config.php`** - Define config to base_url, mysql, environment, timezone etc

Example: 

```php
$config['base_url'] = 'http://localhost:8080/';

$config['environment'] = 'development';

$config['mysql'] = [
    'host'     => 'localhost',
    'dbname'   => 'codemini_tests',
    'username' => 'root',
    'password' => '',
    'charset'  => 'utf8',
    'display_error' => ($config['environment'] == 'development') ? true : false
];

$config['session_name'] = 'MY_Session_name_';

$config['timezone'] = 'America/Sao_Paulo';

$config['page_not_found'] = 'PageNotFound@index';

$config['view_extension'] = '.phtml';
```
> **Note:** the file app/Config.php has full documentation each option

- **app / `Constants.php`** - Define your project name and files location

 ... and create yours Controllers, Views and Models !

## Using Controller, Models and Views

### Creating Controller

Controllers / `Home.php`

- With cli-tools: `php cli-tools create-controller Home`

Output: ./app/Controllers/Home.php

 ```php
<?php 
namespace App\Controllers;

use Codemini\Core\Controller;
use Codemini\Core\Request;

class Home extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index($args=""){
        
        //Data to view
        //Example: $this->view->data = ['php', 'js', 'nodejs', 'mongodb', 'css'];

		//Load view
		//$this->view('template_name');
		
		echo "Controller name: " . Request::getController() . "<br>";
         echo "Method name: " . Request::getMethod() . "<br>";
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
    
    <title>Application name</title>
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

Models / `Products.php`

- With cli-tools: `php cli-tools create-model Products`

Output: ./app/Models/Products.php
 
 ```php
<?php 
namespace App\Models;

use Codemini\Core\Model;

class Products extends Model{

	protected $table = 'table_name';

	/**
	 * Construct the parent model class for get instance '$this->db' PDO and the 
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
```
## Helper Functions

- `configItem('key')` return the config specified name.
Example: `<?php echo configItem('base_url') ?>`

- `&getInstance()` return controller object instance

## Libraries

**How to use librarie in Controller?**

It is very simple!
Just load it with `use` instruction and the librarie will be available for you.

Example:

```php 
<?php 
namespace App\Controllers;

//IMPORTANT
// Don't forget to load with 'use' instruction
use Codemini\Core\Controller;
use Codemini\Libraries\Input;

class Teste extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index($args){
        //$_POST
        $email = Input::post('email');
        $password = Input::post('password');
       
        //$_GET
        $email = Input::get('email');
        $password = Input::get('password');
        
        //FILE
        $userfile = Input::file('userfile');
        
        //ALL REQUEST
        print_r($allRequest = Input::all());
    }

}
```

**The basic libraries of Codemini**

- `Input` - Help you to manipulate get, post, file
	- `echo Input::get('email')`
	- `echo Input::post('email')`
	- `echo Input::file('userfile')`
	- `echo Input::all()`
- `Redirect` - Redirect user to other location
	- `echo Redirect::to(configItem('base_url') . 'login/index')`
- `Session` - Help you to manipulate session data
	- `Session::start()`
	- `Session::set('logged_in', true)`
	- `Session::set(array('user_id' => 1, 'logged_in' => true))`
	- `Session::get('user_id')`
	- `Session::has('logged_in')`
	- `Session::all()`
	- `Session::id()`
	- `Session::regenerateId()`
	- `Session::remove('user_id')`
	- `Session::destroy()`
- `Validator` - Help you validate data
	- `Validator::getErrors()`
	- `Validator::getMsg()`
	- `Validator::setOpenTag('<p>')`
	- `Validator::setCloseTag('</p>')`
	- `Validator::required($val)`
	- `Validator::isEmail($val)`
	- `Validator::isUrl($val)`
	- `Validator::isFloat($val)`
	- `Validator::isInt($val)`
	- `Validator::isBool($val)`
	- `Validator::isIp($val)`
	- `Validator::regex($val, '/[a-z]/i')`

> **Note:** The libraries has full documentation in each option.

### Do you want to create other folders and files?

You are free! 
So example, create a folder `Helpers` in `./app/` and a file `Upload.php` and the only thing you have to do is set the properly namespace for autoloading.

Example `./app/Helpers/Upload.php`:

```php
<?php 

namespace App\Helpers;

class Upload
{
	public static function setUpload($file) 
	{
		//The logic code here...
	}
}
```

And then use it in any controller this way:

Example `./app/Controllers/Home.php`

```php
<?php 
namespace App\Controllers;

use Codemini\Core\Controller;

// IMPORTANT:
// Don't forget load the helper librarie you have created
use App\Helpers\Upload;

class Home extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index($args=""){
        // call methods
        Upload::setUpload($_FILE['userfile']);
    }

}
```

### Do you want to use other components from Packagist?

It is very simple!
Just run Composer require command and load it the same way above.

Example 1: `composer require plasticbrain/php-flash-messages`

Example 2: `composer require monolog/monolog`

### Author

Fabricio Pólito - <fabriciopolito@gmail.com> - <https://github.com/fabriciopolito>

Thanks using it :+1:

### License

Codemini is licensed under the MIT License :heavy_check_mark:
