<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\CidadeDAO;
use App\Models\DAO\EstadoDAO;
use App\Models\DAO\UsuarioDAO;
use App\Models\Entidades\Cidade;
use App\Models\Validacao\CidadeValidador;
use App\Models\Entidades\Usuario;
use App\Models\Entidades\Estado;
use App\Services\CidadeService;
use App\Services\EstadoService;
use App\Services\UsuarioService;


class CidadeController extends Controller
{
    public function index($params)
    {
        $cidId = $params[0];
        $cidadeService = new CidadeService();

        self::setViewParam('listaCidades', $cidadeService->listar($cidId));

        $this->render('/cidade/index');

        Sessao::limpaMensagem();
    }

    public function autoComplete($params)
    {
        $cidade = new Cidade();
        $cidade->CidNome($params[0]);        
        $cidadeService = new CidadeService();
        $busca = $cidadeService->autoComplete($cidade);
        
        echo $busca;
    }

    public function cadastro()
    {
        if(Sessao::existeFormulario()) { 
        $cidade = new Cidade();
        $estadoService = new EstadoService();
        $estId = Sessao::retornaValorFormulario('estado');
        $estado = $estadoService->listar($estId);
        $cidade->setEstado($estado);
        }else{
            $cidade = new Cidade();
            $cidade->setEstado(new Estado());
        }
        $this->setViewParam('cidade',$cidade);        
        $this->render('/cidade/cadastro');
        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $estadoService  = new EstadoService();        
        $usuarioService = new UsuarioService();        
        $estado         = $estadoService->listar($_POST['estado']);
        $usuario        = $usuarioService->listar($_POST['cidUsuario']);
        
        $cidade = new Cidade();
        $cidade->setCidNome($_POST['cidNome']);        
        $cidade->setEstado($estado);
        $cidade->setUsuario($usuario);

        Sessao::gravaFormulario($_POST);

        $cidadeValidador    = new CidadeValidador();
        $resultadoValidacao = $cidadeValidador->validar($cidade);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/cidade/cadastro');
        }

        $cidadeService = new CidadeService();
    
        if($cidadeService->salvar($cidade)){
            $this->redirect('/cidade');
        }else{
            $this->redirect('/cidade/cadastro');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function edicao($params)
    {
        $cidId = $params[0];
        
        if(Sessao::existeFormulario()) { 
            $cidade = new Cidade();
            $cidade->setCidId(Sessao::retornaValorFormulario('cidId'));
            $cidade->setCidNome(Sessao::retornaValorFormulario('cidNome'));
            $cidade->setCidDataAlteracao(Sessao::retornaValorFormulario('dataAlteracao'));
            $estadoService = new EstadoService();
            $usuarioService = new UsuarioService();
            $estId = Sessao::retornaValorFormulario('estado');
            $id = Sessao::retornaValorFormulario('cidUsuario');
            $estado = $estadoService->listar($estId);
            $usuario = $usuarioService->listar($id);
            $cidade->setEstado($estado);
            $cidade->setUsuario($usuario);
            
        }else{           
            $cidadeService = new CidadeService();
            $cidade = $cidadeService->listar($cidId)[0]; 
        }
       
        if (!$cidade) {
            Sessao::gravaMensagem("Cadastro inexistente");
            $this->redirect('/cidade');
        }
            
       $this->setViewParam('cidade', $cidade);
       
        $this->render('/cidade/editar');

        Sessao::limpaMensagem();
    }

    public function atualizar()
    {
        $estadoService  = new EstadoService();        
        $usuarioService = new UsuarioService();        
        $estado         = $estadoService->listar($_POST['estado']);
        $usuario        = $usuarioService->listar($_POST['cidUsuario']);
        
        $cidade = new Cidade();
        $cidade->setCidId($_POST['cidId']);
        $cidade->setCidNome($_POST['cidNome']);
        $cidade->setEstado($estado);
        $cidade->setUsuario($usuario);
        $cidade->setCidDataAlteracao($_POST['dataAlteracao']);
        
        
        $cidadeValidador = new CidadeValidador();
        $resultadoValidacao = $cidadeValidador->validar($cidade);
        
        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            Sessao::gravaMensagem("erro na atualizacao");
            Sessao::gravaFormulario($_POST);
            $this->redirect('/cidade/edicao/' . $_POST['cidId']);
        }
        
        $cidadeService = new CidadeService();        
        if ($cidadeService->Editar($cidade)) {
            $this->redirect('/cidade');
            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
            Sessao::limpaErro();
        }else{
            Sessao::gravaFormulario($_POST);            
            Sessao::gravaMensagem("erro na atualizacao");
          $this->redirect('/cidade/edicao/' . $_POST['cidId']);
        }

    }
    
    public function exclusao($params)
    {
        $cidId = $params[0];

        $cidadeService = new CidadeService();

        $cidade = $cidadeService->listar($cidId)[0];

        if (!$cidade) {
        Sessao::gravaMensagem("Cidade inexistente");
            $this->redirect('/cidade');
        }

        self::setViewParam('cidade', $cidade);

        $this->render('/cidade/exclusao');

        Sessao::limpaMensagem();
    }

    public function excluir()
    {
        $cidade = new Cidade();
        $cidade->setCidId($_POST['cidId']);

        $cidadeService= new CidadeService();

        if (!$cidadeService->excluir($cidade)) {
            Sessao::gravaMensagem("Cidade inexistente");
            $this->redirect('/cidade/exclusao'.$cidade->getCidId());
        }

        Sessao::gravaMensagem("Cidade excluido com sucesso!");

        $this->redirect('/cidade');
    }

}
