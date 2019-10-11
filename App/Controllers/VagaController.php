<?php

namespace App\Controllers;

use App\Lib\Sessao;

use App\Models\Entidades\Vaga;
use App\Models\Entidades\Empresa;
use App\Models\Entidades\Tecnologia;

use App\Models\Validacao\VagaValidador;

use App\Services\VagaService;
use App\Services\EmpresaService;
use App\Services\TecnologiaService;

class VagaController extends Controller
{
    public function listar($params)
    {
        $id = $params[0];
        $vagaService = new VagaService();
        $vaga = $vagaService->listar($id);

        $this->setViewParam('vaga', $vaga);
        $this->render('/vaga/listar');
        
        Sessao::limpaMensagem();
    }

    public function cadastrar()
    {
        if(Sessao::existeFormulario()) { 
            $vaga = new Vaga();
            $vaga->setIdVaga(Sessao::retornaValorFormulario('idvaga'));
            $vaga->setTitulo(Sessao::retornaValorFormulario('titulo'));
            $vaga->setDescricao(Sessao::retornaValorFormulario('descricao'));

            $idEmpresa = Sessao::retornaValorFormulario('empresa');
            $empresaService = new EmpresaService();
            $empresa = $empresaService->listar($idEmpresa)[0];
            $vaga->setEmpresa($empresa);

            $tecnologias = Sessao::retornaValorFormulario('tecnologias');
            
            if(empty($tecnologias)) {
                $vaga->setTecnologias(array());    
            } else {
                $tecnologiaService = new TecnologiaService(); 
                $tecnologias = $tecnologiaService->preencheTecnologias($tecnologias);
                $vaga->setTecnologias($tecnologias); 
            }

        } else {
            $vaga = new Vaga();
            $vaga->setEmpresa(new Empresa());
            $vaga->setTecnologias(array());
        }        

        $this->setViewParam('vaga',$vaga);
        $this->render('/vaga/cadastro');

        Sessao::limpaErro();
        Sessao::limpaFormulario();
    }   

    public function salvar()
    {
        $vaga = new Vaga();
        $vaga->setTitulo(trim($_POST['titulo']));
        $vaga->setDescricao(trim($_POST['descricao']));        

        if(ctype_digit($_POST['empresa'])) {
            $empresaService = new EmpresaService();
            $empresa = $empresaService->listar($_POST['empresa'])[0];
        } else {
            throw new \Exception("Erro ao cadastrar a vaga", 500);
        }

        if(is_null($empresa)) {
            throw new Exception("Erro ao cadastrar a vaga", 500);
        } else {
            $vaga->setEmpresa($empresa);
            $tecnologiaService = new TecnologiaService();
            $tecnologias = $tecnologiaService->preencheTecnologias($_POST['tecnologias']);

            $vaga->setTecnologias($tecnologias);

            Sessao::gravaFormulario($_POST);

            $vagaService = new VagaService();

            if ($vagaService->salvar($vaga)) {   
                $this->redirect('/vaga/listar');
            } else {
                $this->redirect('/vaga/cadastrar');
            } 
        }           
    }

    public function edicao($params)
    {
        $id = $params[0];
        $tecnologiaService = new TecnologiaService(); 

        if(ctype_digit($id)) {
            if(Sessao::existeFormulario()) {
                $vaga = new Vaga();
                $vaga->setIdVaga(Sessao::retornaValorFormulario('idvaga'));
                $vaga->setTitulo(Sessao::retornaValorFormulario('titulo'));
                $vaga->setDescricao(Sessao::retornaValorFormulario('descricao'));

                $empresaService = new EmpresaService(); 
                $idEmpresa = Sessao::retornaValorFormulario('empresa');
                $empresa = $empresaService->listar($idEmpresa)[0];  
                $vaga->setEmpresa($empresa);

                $tecnologias = Sessao::retornaValorFormulario('tecnologias');
                
                if(empty($tecnologias)) {
                    $vaga->setTecnologias(array());
                } else {
                    $tecnologiaService = new TecnologiaService(); 
                    $tecnologias = $tecnologiaService->preencheTecnologias($tecnologias);
                    $vaga->setTecnologias($tecnologias);  
                }                
                Sessao::limpaFormulario();              
            } else {
                $vagaService = new VagaService();
                $vaga = $vagaService->listar($id)[0]; 
                $vaga->setTecnologias($tecnologiaService->listarPorVaga($vaga));
            }            

            if(is_null($vaga)) {
                throw new \Exception("Página não encontrada.", 404);
            } else {               

                Sessao::gravaFormulario($_POST);
                
                $this->setViewParam('vaga', $vaga);
                $this->render('/vaga/editar');

                Sessao::limpaFormulario();
                Sessao::limpaErro();
                Sessao::limpaMensagem();
            }

        } else {
            throw new \Exception("Página não encontrada.", 404);
        }
    }

    public function editar()
    {
        if(empty($_POST)) {
            throw new \Exception("Página não encontrada.", 404);
        } else {
            $vaga = new Vaga();
            $vaga->setIdVaga(trim($_POST['idvaga']));
            $vaga->setTitulo(trim($_POST['titulo']));
            $vaga->setDescricao(trim($_POST['descricao']));

            $empresaService = new EmpresaService();
            $vaga->setEmpresa($empresaService->listar($_POST['empresa'])[0]);

            $tecnologiaService = new TecnologiaService();
            $tecnologias = $tecnologiaService->preencheTecnologias($_POST['tecnologias']);
            $vaga->setTecnologias($tecnologias);

            Sessao::gravaFormulario($_POST);

            $vagaService = new VagaService();
            if ($vagaService->editar($vaga)) {
                 $this->redirect('/vaga/listar/');
            } else {
                $this->redirect('/vaga/edicao/'.$vaga->getIdVaga());
            } 
        }        
    }

    public function exclusao($params)
    {
        $id = $params[0];

        if(ctype_digit($id)) {

            $vagaService = new VagaService();
            $vaga = $vagaService->listar($id)[0];

            if(is_null($vaga)){
                throw new \Exception("Página não encontrada.", 404);
            } else {
                $this->setViewParam('vaga',$vaga);

                $tecnologiaService = new TecnologiaService();
                $tecnologias = $tecnologiaService->listarPorVaga($vaga);
                
                $this->setViewParam('tecnologias', $tecnologias);
                $this->render('/vaga/excluir');

                Sessao::limpaMensagem();
            }           

        } else {
            throw new \Exception("Página não encontrada.", 404);
        }
    }

    public function excluir()
    {
        if(empty($_POST)) {
            throw new \Exception("Página não encontrada.", 404);
        } else {
            $vagaService = new VagaService();
            $vaga = new Vaga();
            $vaga->setIdVaga($_POST['idvaga']);        

            if($vagaService->excluir($vaga)) {                                 
                $this->redirect('/vaga/listar');
            } else {                         
                $this->redirect('/vaga/exclusao/'.$vaga->getIdVaga());                
            }   
        }

    }
}