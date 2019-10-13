<?php 

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\ClienteDAO;
use App\Models\Entidades\Cliente;
use App\Models\Entidades\Pedido;
use App\Models\Validacao\ClienteValidador;
use App\Services\ClienteService;

class ClienteController extends Controller{

    public function index(){

        $clienteDAO = new ClienteDAO();

        self::setViewParam('listarCliente',$clienteDAO->listar());

        $this->render('/cliente/index');

        Sessao::limpaMensagem();
    }
    
    public function autoComplete($params)
    {
        $cliente = new Cliente();
        $cliente->setNomeFantasiaCliente($params[0]);
        
        $clienteService = new ClienteService();
        $busca = $clienteService->autoComplete($cliente);
        
        echo $busca;
    }

    public function cadastro(){
   

        $this->render('/cliente/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaFormulario();
        Sessao::limpaErro();


    }

    public function salvar(){

        $Cliente = new Cliente();
        $Cliente->setNomeCliente($_POST['nomeCliente']);
        $Cliente->setNomeFantasiaCliente($_POST['nomeFantasiaCliente']);
        $Cliente->setTipoCliente($_POST['tipoCliente']);
        $Cliente->setStatus($_POST['status']);

        Sessao::gravaFormulario($_POST);


        $clienteDAO = new ClienteDAO();
        $clienteDAO->salvar($Cliente);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/cliente');

    }

    public function edicao($params){        
        $codCliente = $params[0];

        if(!$codCliente){             
            Sessao::gravaMensagem("Nenhum Cadastro Selecionado");
            $this->redirect('/cliente');                  
        }
        $clienteDAO = new ClienteDAO();

        $cliente = $clienteDAO->listar($codCliente);

        if(!$cliente){
             
            Sessao::gravaMensagem("Cliente inexistente");
            $this->redirect('/cliente');   
                 
        }
        
        self::setViewParam('cliente', $cliente);
        $this->render('/cliente/editar');

        Sessao::limpaMensagem();
    }

    public function atualizar(){

        $cliente = new Cliente();
        $cliente->setCodCliente($_POST['codCliente']);
        $cliente->setNomeCliente($_POST['nomeCliente']);
        $cliente->setNomeFantasiaCliente($_POST['nomeFantasiaCliente']);
        $cliente->setTipoCliente($_POST['tipoCliente']);
        $cliente->setStatus($_POST['status']);

        Sessao::gravaFormulario($_POST);

        $clienteValidacao = new ClienteValidador();
        $resultadoValidacao = $clienteValidacao->validar($cliente);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/cliente/edicao/'.$_POST['codCliente']);
        }

        $clienteDAO = new ClienteDAO();
        $clienteDAO->atualizar($cliente);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/cliente');
    }

    public function exclusao($params){

        $codCliente = $params[0];
        if(!$codCliente){             
            Sessao::gravaMensagem("Nenhum Cadastro Selecionado");

            $this->redirect('/cliente');                    
        }

        $clienteDAO= new ClienteDAO();

        $cliente= $clienteDAO->listar($codCliente);

        if(!$cliente){
            Sessao::gravaMensagem("Cliente inexistente");
            $this->redirect('/cliente');
        }

        self::setViewParam('cliente', $cliente);
        $this->render('/cliente/exclusao');

        Sessao::limpaMensagem();

    }

    public function excluir(){

        $cliente = new Cliente();
        $cliente->setCodCliente($_POST['codCliente']);

        $clienteDAO = new ClienteDAO();

        if(!$clienteDAO->excluir($cliente)){

            Sessao::gravaMensagem("cliente inexistente");
            $this->redirect('/cliente');
        }

        Sessao::gravaMensagem("Cliente excluído com sucesso !");
        $this->redirect('/cliente');
    }


}


?>