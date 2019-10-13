<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\UsuarioDAO;
use App\Models\DAO\DepartamentoDAO;
use App\Models\Entidades\Usuario;
use App\Models\Validacao\UsuarioValidador;

class UsuarioController extends Controller
{

    public function index()
    {
        $usuarioDAO = new UsuarioDAO();

        self::setViewParam('listaUsuarios', $usuarioDAO->listar());

        $this->render('/usuario/index');

        Sessao::limpaMensagem();
    }

    public function cadastro()
    {

        $departamentoDAO = new DepartamentoDAO();
        self::setViewParam('listaDepartamentos', $departamentoDAO->listar());
        $this->render('/usuario/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }


    public function salvar()
    {
        $usuario = new Usuario();
        $usuario->setNome($_POST['nome']);
        $usuario->setNivel($_POST['nivel']);
        $usuario->setEmail($_POST['email']);
        $usuario->setId_dep($_POST['id_dep']);
        $usuario->setStatus($_POST['status']);
        $usuario->setDataCadastro($_POST['dataCadastro']);
        $usuario->setValida($_POST['valida']);
        $usuario->setDica($_POST['dica']);
        $usuario->setSenha($_POST['senha']);
        $usuario->setFk_Instituicao($_POST['fk_instituicao']);

        Sessao::gravaFormulario($_POST);

        $usuarioDAO = new UsuarioDAO();

        if ($usuarioDAO->verificaEmail($_POST['email'])) {
            Sessao::gravaMensagem("Email existente");
            //  $this->redirect('/usuario/cadastro');
        }

        if ($usuarioDAO->salvar($usuario)) {
            $this->redirect('/usuario/sucesso');
        } else {
            Sessao::gravaMensagem("Erro ao gravar");
        }
    }

    public function edicao($params)
    {

        $id = $params[0];
        if (!$id) {
            Sessao::gravaMensagem("Nenhum Cadastro Selecionado");
            $this->redirect('/usuario');
        }
        $usuarioDAO = new UsuarioDAO();

        $usuario = $usuarioDAO->listar($id);

        if (!$usuario) {
            Sessao::gravaMensagem("Usuario inexistente");
            $this->redirect('/usuario');
        }

        $departamentoDAO = new DepartamentoDAO();
        self::setViewParam('listaDepartamentos', $departamentoDAO->listar());
        self::setViewParam('usuario', $usuario);
        $this->render('/usuario/editar');

        Sessao::limpaMensagem();
    }

    public function atualizar()
    {
        $usuario = new Usuario();
        $usuario->setId($_POST['id']);
        $usuario->setNome($_POST['nome']);
        $usuario->setNivel($_POST['nivel']);
        $usuario->setEmail($_POST['email']);
        $usuario->setId_dep($_POST['id_dep']);
        $usuario->setStatus($_POST['status']);
        //$usuario->setDataCadastro($_POST['dataCadastro']);
        //$usuario->setValida($_POST['valida']);
        $usuario->setDica($_POST['dica']);
        //$usuario->setSenha($_POST['senha']);
        $usuario->setFk_Instituicao($_POST['fk_instituicao']);

        Sessao::gravaFormulario($_POST);
        $usuarioValidador = new UsuarioValidador();
        $resultadoValidacao = $usuarioValidador->validar($usuario);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/usuario/edicao/' . $_POST['id']);
        }

        $usuarioDAO = new UsuarioDAO();

        if ($usuarioDAO->verificaEmail($_POST['email'])) {
            Sessao::gravaMensagem("Email existente");
            $this->redirect('/usuario/cadastro');
        }

        $usuarioDAO->atualizar($usuario);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/usuario');
    }



    public function exclusao($params)
    {

        $id = $params[0];
        if (!$id) {
            Sessao::gravaMensagem("Nenhum Cadastro Selecionado");
            $this->redirect('/usuario');
        }
        $usuarioDAO = new UsuarioDAO();

        $usuario = $usuarioDAO->listar($id);

        if (!$usuario) {
            Sessao::gravaMensagem("Usuario inexistente");
            $this->redirect('/usuario');
        }

        self::setViewParam('Usuario', $usuario);
        $this->render('/usuario/exclusao');

        Sessao::limpaMensagem();
    }

    public function excluir()
    {
        $sla = new Sla();
        $sla->setId($_POST['id']);

        $usuarioDAO = new UsuarioDAO();

        if (!$usuarioDAO->excluir($usuario)) {
            Sessao::gravaMensagem("Usuario inexistente");
            $this->redirect('/usuario');
        }

        Sessao::gravaMensagem("Usuario excluido com sucesso!");

        $this->redirect('/usuario');
    }

    public function sucesso()
    {
        if (Sessao::retornaValorFormulario('nome')) {
            $this->render('/usuario/sucesso');

            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
        } else {
            $this->redirect('/');
        }
    }
}
