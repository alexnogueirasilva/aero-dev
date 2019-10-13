<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\StatusDAO;
use App\Models\Entidades\Status;
use App\Models\Validacao\StatusValidador;

class StatusController extends Controller
{
    public function index()
    {
        $statusDAO = new StatusDAO();
       
        self::setViewParam('listaStatus', $statusDAO->listar());


        $this->render('/status/index');

        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        $this->render('/sla/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $sla = new Sla();
        $sla->setDescricao($_POST['descricao']);
        $sla->setTempo($_POST['tempo']);
        $sla->setUniTempo($_POST['uniTempo']);
        $sla->setFk_Instituicao($_POST['fk_instituicao']);

        Sessao::gravaFormulario($_POST);

        $slaValidador = new SlaValidador();
        $resultadoValidacao = $slaValidador->validar($sla);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/sla/cadastro');
        }

        $slaDAO = new SlaDAO();

        $slaDAO->salvar($sla);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/sla');
    }

    public function edicao($params)
    {
        $id = $params[0];

        if (!$id) {
            Sessao::gravaMensagem("Nenhum cadastro selcionado");
            $this->redirect('/status');
        }
        $statusDAO = new statusDAO();

        $status = $statusDAO->listar($id);

        if (!$status) {
            Sessao::gravaMensagem("status inexistente");
            $this->redirect('/status');
        }

        self::setViewParam('status', $status);

        $this->render('/status/editar');

        Sessao::limpaMensagem();
    }

    public function atualizar()
    {

        $status = new status();
        $status->setId($_POST['id']);
        $status->setDescricao($_POST['descricao']);
        $status->setTempo($_POST['tempo']);
        $status->setUniTempo($_POST['uniTempo']);
        $status->setFk_Instituicao($_POST['fk_instituicao']);

        Sessao::gravaFormulario($_POST);

        $statusValidador = new statusValidador();
        $resultadoValidacao = $statusValidador->validar($status);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/status/edicao/' . $_POST['id']);
        }

        $statusDAO = new statusDAO();

        $statusDAO->atualizar($status);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/status');
    }

    public function exclusao($params)
    {
        $id = $params[0];
        if (!$id) {
            Sessao::gravaMensagem("Nenhum cadastro selcionado");
            $this->redirect('/status');
        }
        $statusDAO = new statusDAO();

        $status = $statusDAO->listar($id);

        if (!$status) {
            Sessao::gravaMensagem("status inexistente");
            $this->redirect('/status');
        }

        self::setViewParam('status', $status);

        $this->render('/status/exclusao');

        Sessao::limpaMensagem();
    }

    public function excluir()
    {
        $status = new Status();
        $status->setId($_POST['id']);

        $statusDAO = new StatusDAO();

        if (!$statusDAO->excluir($status)) {
            Sessao::gravaMensagem("status inexistente");
            $this->redirect('/status');
        }

        Sessao::gravaMensagem("status excluido com sucesso!");

        $this->redirect('/status');
    }
}
