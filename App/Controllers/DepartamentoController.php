<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\InstituicaoDAO;
use App\Models\DAO\DepartamentoDAO;
use App\Models\Entidades\Departamento;
use App\Models\Validacao\DepartamentoValidador;


class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentoDAO = new DepartamentoDAO();

        self::setViewParam('listaDepartamentos',$departamentoDAO->listar());

        $this->render('/departamento/index');

        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
       // $instituicaoDAO = new InstituicaoDAO();
       // self::setViewParam('listaInstituicao', $instituicaoDAO->listar());
        $this->render('/departamento/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $departamento = new Departamento();
        $departamento->setNome($_POST['nome']);
        $departamento->getInstituicao()->setInst_Codigo($_POST['inst_codigo']);

        Sessao::gravaFormulario($_POST);

        $departamentoValidador = new DepartamentoValidador();
        $resultadoValidacao = $departamentoValidador->validar($departamento);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/departamento/cadastro');
        }

        $departamentoDAO = new DepartamentoDAO();

        $departamentoDAO->salvar($departamento);
        
        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/departamento');
      
    }
    
    public function edicao($params)
    {
        $id = $params[0];
        if (!$id) {
            Sessao::gravaMensagem("Nenhum cadastro selcionado");
            $this->redirect('/departamento');
        }

        $departamentoDAO = new DepartamentoDAO();
    
        $departamento = $departamentoDAO->listar($id);

        if(!$departamento){
            Sessao::gravaMensagem("Departamento inexistente");
            $this->redirect('/departamento');
        }

        $instituicaoDAO = new InstituicaoDAO();
        //self::setViewParam('listaInstiruicao', $instituicaoDAO->listar());
        self::setViewParam('departamento',$departamento);
        $this->render('/departamento/editar');

        Sessao::limpaMensagem();

    }

    public function atualizar()
    {

        $departamento = new Departamento();
        $departamento->setId($_POST['id']);
        $departamento->setNome($_POST['nome']);
       // $departamento->getInstituicao()->setInst_Codigo($_POST['inst_codigo']);
        $departamento->setFk_IdInstituicao($_POST['inst_codigo']);
        Sessao::gravaFormulario($_POST);

        $departamentoValidador = new DepartamentoValidador();
        $resultadoValidacao = $departamentoValidador->validar($departamento);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/departamento/edicao/'.$_POST['id']);
        }

        $departamentoDAO = new DepartamentoDAO();

        $departamentoDAO->atualizar($departamento);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/departamento');

    }
    
    public function exclusao($params)
    {
        $id = $params[0];
        if (!$id) {
            Sessao::gravaMensagem("Nenhum cadastro selcionado");
            $this->redirect('/departamento');
        }
        $departamentoDAO = new DepartamentoDAO();

        $departamento = $departamentoDAO->listar($id);

        if(!$departamento){
            Sessao::gravaMensagem("Departamento inexistente");
            $this->redirect('/departamento');
        }

        self::setViewParam('departamento',$departamento);

        $this->render('/departamento/exclusao');

        Sessao::limpaMensagem();

    }

    public function excluir()
    {
        $departamento = new Departamento();
        $departamento->setId($_POST['id']);

        $departamentoDAO = new DepartamentoDAO();

        if(!$departamentoDAO->excluir($departamento)){
            Sessao::gravaMensagem("Departamento inexistente");
            $this->redirect('/departamento');
        }

        Sessao::gravaMensagem("Departamento excluido com sucesso!");

        $this->redirect('/departamento');

    }
}