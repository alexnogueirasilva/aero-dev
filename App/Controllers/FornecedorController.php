<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\FornecedorDAO;
use App\Models\Entidades\Fornecedor;
use App\Models\Validacao\FornecedorValidador;
use App\Models\Entidades\Usuario;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedorDAO = new FornecedorDAO();

        self::setViewParam('listaFornecedores',$fornecedorDAO->listar());      

        $this->render('/fornecedor/index');

        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        $this->render('/fornecedor/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar() {
        $fornecedor = new Fornecedor();
        $fornecedor->setForNomeFantasia($_POST['forNomeFantasia']);
        $fornecedor->setForRazaoSocial($_POST['forRazaoSocial']);
        $fornecedor->setForCnpj($_POST['forCnpj']);

        Sessao::gravaFormulario($_POST);

        $fornecedorValidador = new FornecedorValidador();
        $resultadoValidacao = $fornecedorValidador->validar($fornecedor);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/fornecedor/cadastro');
        }

        $fornecedorDAO = new FornecedorDAO();

        $fornecedorDAO->salvar($fornecedor);
        
        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/fornecedor');
      
    }
    
    public function edicao($params){
        $codFornecedor = $params[0];

        $fornecedorDAO = new FornecedorDAO();

        $fornecedor = $fornecedorDAO->listar($codFornecedor);

        if(!$fornecedor){
            Sessao::gravaMensagem("fornecedor inexistente");
            $this->redirect('/fornecedor');
        }

        self::setViewParam('fornecedor',$fornecedor);

        $this->render('/fornecedor/editar');

        Sessao::limpaMensagem();

    }

    public function atualizar()   {

        $fornecedor = new Fornecedor();
        $fornecedor->setFornecedor_Cod($_POST['codFornecedor']);
        $fornecedor->setForNomeFantasia($_POST['forNomeFantasia']);
        $fornecedor->setForRazaoSocial($_POST['forRazaoSocial']);
        $fornecedor->setForCnpj($_POST['forCnpj']);
        
        Sessao::gravaFormulario($_POST);

        $fornecedorValidador = new FornecedorValidador();
        $resultadoValidacao = $fornecedorValidador->validar($fornecedor);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/fornecedor/edicao/'.$_POST['codFornecedor']);
        }

        $fornecedorDAO = new FornecedorDAO();

        $fornecedorDAO->atualizar($fornecedor);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/fornecedor');

    }
    
    public function exclusao($params)
    {
        $codFornecedor = $params[0];

        $fornecedorDAO = new FornecedorDAO();

        $fornecedor = $fornecedorDAO->listar($codFornecedor);

        if(!$fornecedor){
            Sessao::gravaMensagem("fornecedor inexistente");
            $this->redirect('/fornecedor');
        }

        self::setViewParam('fornecedor',$fornecedor);

        $this->render('/fornecedor/exclusao');

        Sessao::limpaMensagem();

    }

    public function excluir()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->setFornecedor_Cod($_POST['codFornecedor']);

        $fornecedorDAO = new FornecedorDAO();

        if(!$fornecedorDAO->excluir($fornecedor)){
            Sessao::gravaMensagem("fornecedor inexistente");
            $this->redirect('/fornecedor');
        }

        Sessao::gravaMensagem("fornecedor excluido com sucesso!");

        $this->redirect('/fornecedor');

    }
}