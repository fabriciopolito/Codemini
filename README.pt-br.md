![Codemini](https://i.ibb.co/DpZpBjB/codemini.png)

# Codemini
Mini PHP framework - Crie uma aplicação rápida no padrão MVC

**Por que usar o Codemini?**

Se você não quer usar uma estrutura de código complexa e não quer ficar preso a ela, então o Codemini é pra você.

Codemini é muito simples de usar, você poder executar o seu projeto na pasta `public` assim como o Laravel, CodeIgniter 4 por exemplo ou se você estiver usando um host compartilhado, apenas copie o arquivo `index.php` e `.htaccess` da pasta pública para dentro da pasta raiz do seu projeto e tudo é pra funcionar normalmente.

Você pode usar facilmente outros pacotes do Packagist.org dentro do seu projeto, basta executar `composer require <vendor>/<package>` e o Codemini irá entender todos os pacotes que você tem instalado.

**Ferramentas de terceiros como WAMP ou XAMPP**

Como eu disse acima, se você estiver usando um host compartilhado ou usando os utilitários WAMP ou XAMPP localmente, apenas copie `index.php` e `.htaccess` da pasta pública para dentro da pasta raiz do seu projeto e tudo irá funcionar.

**Exemplo:**

1. Copie a pasta do seu projeto para o `www` ou `htdocs`
2. Copie o arquivo `index.php` e `.htaccess` da pasta pública para dentro da pasta raiz

> **Nota:** Remova a pasta public se você quiser

**Por que fazer isso?**

Porque quando você está usando os utilitários WAMP ou XAMPP, o DocumentRoot do Apache está apontando para a pasta raiz do www no caso do WAMP ou para o htdocs no caso do XAMPP e não para a pasta public do framework.

Esta regra é valida não somente para o Codemini mas também para o Laravel, Codeigniter 4 etc. É assim que os frameworks funcionam.

## Requerimentos

- Codemini funciona com PHP 5.4+. :heavy_check_mark:

## Estrutura do projeto

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

## Instalação

#### Criando um projeto com Composer - via create-project

**1 -** Se você quer instalar com o Composer, no terminal, execute: `composer create-project --prefer-dist codemini/framework nome-do-seu-projeto`

**2 -** Depois execute o **cli-tools** para iniciar o servidor integrado do PHP: `php cli-tools serve`

**Opcional:** Execute com o servidor integrado do PHP, vá para a pasta `public` e execute: `php -S localhost:8080`

> **Nota:** Nesse caso não é necessário executar o composer install para criar o autoload porque o próprio composer create-project já faz isso para você.

#### Criando um projeto com o Github

**1 -** Se você quer instalar com o **git clone**, no terminal, execute: `git clone https://github.com/fabriciopolito/Codemini.git` ou faça o download "Download ZIP".

**2 -** Execute o **Composer (obritatório)** na pasta raiz onde contém o arquivo **composer.json** para criar os **arquivos de autoload**.

- Se você tem o Composer instalado globalmente:  `composer install`  
- Se você tem o composer.phar na pasta do seu projeto: `php composer.phar install`

**3 -** Abra o terminal e execute: `php cli-tools serve`

**Opcional:** Execute com o servidor integrado do PHP, vá para a pasta `public` e execute: `php -S localhost:8080`

---

Seu arquivo `index.php` deve se parecer com isso:

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

## Configuração

> **Nota:** Codemini não tem muitos arquivos de configuração

**Modifique os arquivos padrão:**

 - **app / `Config.php`** - Configure seu base_url, mysql, environment, timezone etc

Exemplo: 

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
> **Nota:** O arquivo app/Config.php tem uma explicação do que cada opção faz

- **app / `Constants.php`** - Opcional, configure o nome do seu projeto e os arquivos de localização do framework

 ... e crie os seus Controllers, Views e Models.

## Usando os Controllers, Views e Models

### Criando Controller

Controllers / `Home.php`

- Com o cli-tools: `php cli-tools create-controller Home`

Saída: ./app/Controllers/Home.php

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
        
        //Dados para a view
        //Example: $this->view->data = ['php', 'js', 'nodejs', 'mongodb', 'css'];

		//Carregar view
		//$this->view('template_name');
		
		echo "Controller name: " . Request::getController() . "<br>";
        echo "Method name: " . Request::getMethod() . "<br>";
    }

}
```
 
### Criando Views

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
    
    <title>Nome da aplicação</title>
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

### Criando Models

Models / `Products.php`

- Com o cli-tools: `php cli-tools create-model Products`

Saída: ./app/Models/Products.php
 
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
## Funções de ajuda

- `configItem('chave')` retorna a configuração desejada 
Exemplo: `<?php echo configItem('base_url') ?>`

- `&getInstance()` retorna a instância do objecto controller

## Bibliotecas

**Como usar uma biblioteca no Controller?**

É muito simples!
Apenas use a instrução `use` e a biblioteca estará disponível para você.

Exemplo:

```php 
<?php 
namespace App\Controllers;

//IMPORTANTE
// Não esqueça da instrução "use"
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

**As bibliotecas básicas do Codemini**

- `Input` - Ajuda você a manipular get, post, file
	- `echo Input::get('email')`
	- `echo Input::post('email')`
	- `echo Input::file('userfile')`
	- `echo Input::all()`
- `Redirect` - Redireciona o usuário para outro lugar
	- `echo Redirect::to(configItem('base_url') . 'login/index')`
- `Session` - Ajuda você a manipular os dados de sessão
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
- `Validator` - Ajuda você a validar os dados
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

> **Nota:** As bibliotecas tem uma explicação do que cada opção faz

### Você quer criar outras pastas e arquivos?

Você é livre!
Por exemplo, crie uma pasta `Helpers` no `./app/`e um arquivo chamado `Upload.php` e a única coisa que você tem que fazer é configurar os `namespaces` corretamente de acordo com a hierarquia das pastas.

Exemplo `./app/Helpers/Upload.php`:

```php
<?php 

namespace App\Helpers;

class Upload
{
	public static function setUpload($file) 
	{
		//A lógica do seu código aqui...
	}
}
```

E depois use a sua biblioteca em qualquer lugar do seu Controller, dessa forma:

Exemplo `./app/Controllers/Home.php`

```php
<?php 
namespace App\Controllers;

use Codemini\Core\Controller;

// IMPORTANTE:
// Não esqueça da instrução "use"
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

### Você quer usar outros componentes do Packagist?

É muito simples!
Basta executar o composer require e carregar a biblioteca da mesma forma acima.

Exemplo 1: `composer require plasticbrain/php-flash-messages`

Exemplo 2: `composer require monolog/monolog`

### Desenvolvedor

Fabricio Pólito - <fabriciopolito@gmail.com> - <https://github.com/fabriciopolito>

Obrigado por usar :+1:

### License

Codemini está licenciado sob o MIT License :heavy_check_mark:
