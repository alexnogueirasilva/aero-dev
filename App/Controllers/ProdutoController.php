<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\ProdutoDAO;
use App\Models\DAO\MarcaDAO;
use App\Models\DAO\FornecedorDAO;
use App\Models\Entidades\Produto;
use App\Models\Validacao\ProdutoValidador;
use App\Models\Entidades\Usuario;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtoDAO = new ProdutoDAO();

        self::setViewParam('listaProdutos', $produtoDAO->listar());

        $this->render('/produto/index');

        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        $fornecedorDAO = new FornecedorDAO();
        self::setViewParam('listaFornecedores', $fornecedorDAO->listar());

        $marcaDAO = new MarcaDAO();
        self::setViewParam('listaMarcas', $marcaDAO->listar());

        $this->render('/produto/cadastro');
        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $produto = new Produto();
        $produto->setProNome($_POST['proNome']);
        $produto->setProNomeComercial($_POST['proNomeComercial']);
        $produto->setProMarca($_POST['proMarca']);
        $produto->setProFornecedor($_POST['proFornecedor']);
        $produto->setProUsuario($_POST['proUsuario']);
        $produto->setProDataAlteracao($_POST['proDataAlteracao']);
        $produto->setProDataCadastro($_POST['proDataCadastro']);

        Sessao::gravaFormulario($_POST);

        $produtoValidador = new ProdutoValidador();
        $resultadoValidacao = $produtoValidador->validar($produto);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/produto/cadastro');
        }

        $produtoDAO = new ProdutoDAO();

        $produtoDAO->salvar($produto);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/produto');
    }

    public function edicao($params)
    {
        $proCodigo = $params[0];

        $produtoDAO = new ProdutoDAO();
        $produto = $produtoDAO->listar($proCodigo);
        
        $fornecedorDAO = new FornecedorDAO();
        self::setViewParam('listaFornecedores', $fornecedorDAO->listar());

        $marcaDAO = new MarcaDAO();
        self::setViewParam('listaMarcas', $marcaDAO->listar());
        if (!$produto) {
            Sessao::gravaMensagem("Produto inexistente");
            $this->redirect('/produto');
        }

        self::setViewParam('produto', $produto);

        $this->render('/produto/editar');

        Sessao::limpaMensagem();
    }

    public function atualizar()
    {

        $produto = new Produto();
        $produto->setProCodigo($_POST['proCodigo']);
        $produto->setProNome($_POST['proNome']);
        $produto->setProNomeComercial($_POST['proNomeComercial']);
        $produto->setProMarca($_POST['proMarca']);
        $produto->setProFornecedor($_POST['proFornecedor']);
        $produto->setProUsuario($_POST['proUsuario']);
        $produto->setProDataAlteracao($_POST['proDataAlteracao']);
        

        Sessao::gravaFormulario($_POST);

        $produtoValidador = new ProdutoValidador();
        $resultadoValidacao = $produtoValidador->validar($produto);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/produto/edicao/' . $_POST['proCodigo']);
        }

        $produtoDAO = new ProdutoDAO();

        $produtoDAO->atualizar($produto);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/produto');
    }
    
    public function exclusao($params)
    {
        $proCodigo = $params[0];

        $produtoDAO = new ProdutoDAO();

        $produto = $produtoDAO->listar($proCodigo);

        if (!$produto) {
            Sessao::gravaMensagem("Produto inexistente");
            $this->redirect('/produto');
        }

        self::setViewParam('produto', $produto);

        $this->render('/produto/exclusao');

        Sessao::limpaMensagem();
    }

    public function excluir()
    {
        $produto = new Produto();
        $produto->setProCodigo($_POST['proCodigo']);

        $produtoDAO = new ProdutoDAO();

        if (!$produtoDAO->excluir($produto)) {
            Sessao::gravaMensagem("Produto inexistente");
            $this->redirect('/produto');
        }

        Sessao::gravaMensagem("Produto excluido com sucesso!");

        $this->redirect('/produto');
    }

}
