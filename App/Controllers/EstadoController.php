<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\EstadoDAO;
use App\Models\Entidades\Estado;
use App\Models\Validacao\EstadoValidador;
use App\Services\EstadoService;

class EstadoController extends Controller
{
    public function index($params)
    {
        $estId = $params[0];
        $estadoService = new EstadoService();

        self::setViewParam('listaEstados',$estadoService->listar($estId));      

        $this->render('/estado/index');

        Sessao::limpaMensagem();
    }

    public function autoComplete($params)
    {
        $estado = new Estado();
        $estado->setEstNome($params[0]);        
        $estadoService = new EstadoService();
        $busca = $estadoService->autoComplete($estado);
        
        echo $busca;
    }

    public function autoComplete1($params)
    {
        $estado = new Estado();
        $estado->setEstUf($params[0]);        
        $estadoService = new EstadoService();
        $busca = $estadoService->autoComplete($estado);
        
        echo $busca;
    }


    public function cadastro()
    {
        $this->render('/estado/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar() {
        $estado = new Estado();
        $estado->setEstNome($_POST['estNome']);
        $estado->setEstUf($_POST['estUf']);
        $estado->setEstUsuario($_POST['estUsuario']);
        
        Sessao::gravaFormulario($_POST);

        $estadoValidador = new EstadoValidador();
        $resultadoValidacao = $estadoValidador->validar($estado);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/estado/cadastro');
        }

        $estadoDAO = new EstadoDAO();

        $estadoDAO->salvar($estado);
        
        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/estado');
      
    }
    
    public function edicao($params){
        $estId = $params[0];

        $estadoDAO = new EstadoDAO();

        $estado = $estadoDAO->listar($estId);

        if(!$estado){
            Sessao::gravaMensagem("Estado inexistente");
            $this->redirect('/estado');
        }

        self::setViewParam('estado',$estado);

        $this->render('/estado/editar');

        Sessao::limpaMensagem();

    }

    public function atualizar()   {

        $estado = new Estado();
        $estado->setEstId($_POST['estId']);
        $estado->setEstNome($_POST['estNome']);
        $estado->setEstUf($_POST['estUf']);
        $estado->setEstUsuario($_POST['estUsuario']);
        
        Sessao::gravaFormulario($_POST);

        $estadoValidador = new EstadoValidador();
        $resultadoValidacao = $estadoValidador->validar($estado);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/estado/edicao/'.$_POST['estId']);
        }

        $estadoDAO = new EstadoDAO();

        $estadoDAO->atualizar($estado);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/estado');

    }
    
    public function exclusao($params)
    {
        $estId = $params[0];
    if($estId){
        $estadoService = new EstadoService();
      
        $estado = $estadoService->listar($estId); 
        if(!$estado){
            Sessao::gravaMensagem("Estado inexistente");
            $this->redirect('/estado');
        }else{
            self::setViewParam('estado',$estado);
            $this->render('/estado/exclusao');            
        Sessao::limpaMensagem();
        }
    }else{
        Sessao::gravaMensagem("Estado inexistente");
    }
    }
    
    public function excluir()
    {
     if(empty($_POST['estId'])){

         Sessao::gravaMensagem("Estado inexistente");
     }else{
         $estado = new Estado();
         $estado->setEstId($_POST['estId']);
         $estadoService = new EstadoService();
            if($estadoService->excluir($estado)){
                $this->redirect('/estado');                
            }else{
                $this->redirect('/estado/exclusao'.$estado->getEstId());
            }
     }
        Sessao::limpaMensagem();
    }
}