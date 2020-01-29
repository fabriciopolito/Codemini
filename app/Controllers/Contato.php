<?php 

namespace App\Controllers;

use Codemini\Core\Controller;

class Contato extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view->body = 'Contato/index';
        $this->render('Template/index');
    }

    public function enviar(){

        //Receber dados do $_POST
        //Tratar/Validar dados recebidos
        //Incluir phpmailer ou outra classe de email em composer.json
        //Se estiver tudo ok, configurar o envio
        //e exibir mensagem pro usuário
       
    }

}