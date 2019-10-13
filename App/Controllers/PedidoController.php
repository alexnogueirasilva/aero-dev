<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\PedidoDAO;
use App\Models\DAO\StatusDAO;
use App\Models\DAO\ClienteDAO;
use App\Models\DAO\RepresentanteDAO;
use App\Models\Entidades\Pedido;
use App\Models\Validacao\PedidoValidador;

class PedidoController extends Controller
{

    public function index()
    {

        $pedidoDAO = new PedidoDAO();
        
        self::setViewParam('listaPedido', $pedidoDAO->listar());
        self::setViewParam('listaPedidos', $pedidoDAO->listarTeste());
        
        $this->render('/pedido/index');

        Sessao::limpaMensagem();
    }
    public function teste()
    {        
        $this->render('/pedido/teste');

        Sessao::limpaMensagem();
    }
    public function pesquisa()
    {

        $statusDAO = new StatusDAO();
        self::setViewParam('listaStatus', $statusDAO->listar());

        $clienteDAO = new ClienteDAO();
        self::setViewParam('listaClientes', $clienteDAO->listar());
        $representanteDAO = new RepresentanteDAO();
        self::setViewParam('listaRepresentantes', $representanteDAO->listar());

        $pedido = new Pedido();
        $pedido->setCodStatus($_POST['codStatus']);
        $pedido->setNumeroAF($_POST['numeroAf']);
        $pedido->setNumeroLicitacao($_POST['numeroLicitacao']);
        $pedido->setCodControle($_POST['codControle']);
        $pedido->setCodCliente($_POST['codCliente']);

        $pedidoDAO = new PedidoDAO();

        self::setViewParam('listaPedido', $pedidoDAO->listarTeste1($pedido));
        if ($pedidoDAO->listarTeste1($pedido) == false) {
            Sessao::gravaMensagem("Nenhum Cadastro Localizado!");
        }
        $this->render('/pedido/teste');

        Sessao::limpaMensagem();
        Sessao::limpaFormulario();
    }

    public function cadastro()
    {
        $pedido = new Pedido();
        $statusDAO = new StatusDAO();
        self::setViewParam('listaStatus', $statusDAO->listar());
        $clienteDAO = new ClienteDAO();
        self::setViewParam('listaClientes', $clienteDAO->listar());
        $representanteDAO = new RepresentanteDAO();
        self::setViewParam('listaRepresentantes', $representanteDAO->listar());

        $idCliente = Sessao::retornaValorFormulario('cliente');
        $clienteDAO1 = new ClienteDAO();
        $cliente = $clienteDAO1->listar($idCliente)[0];
        $pedido->getCliente($cliente);

        $this->render('/pedido/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }
    public function salvar()
    {
        $pedido = new Pedido();

        $pedido->setDataCadastro($_POST['dataCadastro']);
        //date_format($date, 'Y-m-d H:i:s');
        $pedido->setNumeroLicitacao($_POST['numeroPregao']);
        $pedido->setNumeroAf($_POST['numeroAf']);
        $pedido->setValorPedido($_POST['valorPedido']);
        $pedido->setCodStatus($_POST['codStatus']);
        $pedido->setCodCliente($_POST['codCliente']);
        $pedido->setAnexo($_POST['anexo']);
        $pedido->setObservacao($_POST['observacao']);
        $pedido->setCodRepresentante($_POST['codRepresentante']);
        $pedido->setFk_Instituicao($_POST['fk_instituicao']);
        $pedido->setDataFechamento($_POST['dataFechamento']);
        $pedido->setDataAlteracao($_POST['dataAlteracao']);

        Sessao::gravaFormulario($_POST);

        $pedidoDAO = new PedidoDAO();

        if ($pedidoDAO->salvar($pedido)) {

            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
            Sessao::limpaErro();
            $this->redirect('/pedido');
        } else {
            Sessao::gravaMensagem("Erro ao gravar");
        }
    }
    public function edicao($params)
    {
        $codControle = $params[0];
        if (!$codControle) {
            Sessao::gravaMensagem("Nenhum Cadastro Selecionado");
            $this->redirect('/pedido');
        }
        $pedidoDAO = new PedidoDAO();

        $pedido = $pedidoDAO->listar($codControle);

        if (!$pedido) {
            Sessao::gravaMensagem("Pedido inexistente");
            $this->redirect('/pedido');
        }

        $clienteDAO = new ClienteDAO();
        self::setViewParam('listaClientes', $clienteDAO->listar());
        $statusDAO = new StatusDAO();
        self::setViewParam('listaStatus', $statusDAO->listar());
        $representanteDAO = new RepresentanteDAO();
        self::setViewParam('listaRepresentantes', $representanteDAO->listar());

        self::setViewParam('pedido', $pedido);
        $this->render('/pedido/editar');

        Sessao::limpaMensagem();
    }

    public function atualizar()
    {
        $pedido = new Pedido();
        //$pedido->setDataCadastro($_POST['dataCadastro']);
        //date_format($date, 'Y-m-d H:i:s');
        $pedido->setCodControle($_POST['codControle']);
        $pedido->setNumeroLicitacao($_POST['numeroPregao']);
        $pedido->setNumeroAf($_POST['numeroAf']);
        //$pedido->setValorPedido(number_format($_POST['valorPedido'], 2, ',', '.'));
        $pedido->setValorPedido($_POST['valorPedido']);
        $pedido->setCodStatus($_POST['codStatus']);
        $pedido->setCodCliente($_POST['codCliente']);
        $pedido->setAnexo($_POST['anexo']);
        $pedido->setObservacao($_POST['observacao']);
        $pedido->setCodRepresentante($_POST['codRepresentante']);
        $pedido->setFk_Instituicao($_POST['fk_instituicao']);
        $pedido->setDataFechamento($_POST['dataFechamento']);
        $pedido->setDataAlteracao($_POST['dataAlteracao']);

        Sessao::gravaFormulario($_POST);
        $pedidoValidador = new PedidoValidador();
        $resultadoValidacao = $pedidoValidador->validar($pedido);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/pedido/edicao/' . $_POST['codControle']);
        }

        $pedidoDAO = new PedidoDAO();


        $pedidoDAO->atualizar($pedido);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/pedido');
    }

    public function exclusao($params)
    {

        $id = $params[0];

        $pedidoDAO = new PedidoDAO();

        $pedido = $pedidoDAO->listar($id);

        if (!$pedido) {
            Sessao::gravaMensagem("pedido inexistente");
            $this->redirect('/pedido');
        }

        self::setViewParam('pedido', $pedido);
        $this->render('/pedido/exclusao');

        Sessao::limpaMensagem();
    }

    public function excluir()
    {
        $pedido = new Pedido();
        $pedido->setCodControle($_POST['codControle']);

        $pedidoDAO = new PedidoDAO();

        if (!$pedidoDAO->excluir($pedido)) {
            Sessao::gravaMensagem("pedido inexistente");
            $this->redirect('/pedido');
        }

        Sessao::gravaMensagem("pedido excluido com sucesso!");

        $this->redirect('/pedido');
    }
}
