<?php

namespace App\Controllers;

use App\Lib\Sessao;

use App\Models\Entidades\Empresa;

use App\Services\EmpresaService;

class EmpresaController extends Controller
{
    public function cadastrar()
    {
        $empresa = new Empresa();

        if(Sessao::existeFormulario()) {             
            $empresa->setRazaoSocial(Sessao::retornaValorFormulario('razaoSocial'));
            $empresa->setNomeFantasia(Sessao::retornaValorFormulario('nomeFantasia'));
            $empresa->setCNPJ(Sessao::retornaValorFormulario('CNPJ'));
            Sessao::limpaFormulario();
        }

        $this->setViewParam('empresa',$empresa);
        $this->render('/empresa/cadastro');
        
        Sessao::limpaErro();        
    }

    public function autoComplete($params)
    {
        $empresa = new Empresa();
        $empresa->setNomeFantasia($params[0]);

        $empresaService = new EmpresaService();
        $busca = $empresaService->autoComplete($empresa);
        
        echo $busca;
    }

    public function listar($params)
    {
        $id = $params[0];
        
        $empresaService = new EmpresaService();
        $empresas = $empresaService->listar($id);

        $this->setViewParam('empresas', $empresas);
        $this->render('/empresa/listar');

        Sessao::limpaMensagem();        
    }

    public function salvar()
    {
        $empresaService = new EmpresaService();
        $empresa = new Empresa();

        $empresa->setRazaoSocial(trim($_POST['razaoSocial']));
        $empresa->setNomeFantasia(trim($_POST['nomeFantasia']));
        $empresa->setCNPJ(trim($_POST['CNPJ']));

        Sessao::gravaFormulario($_POST);

        if ($empresaService->salvar($empresa)) {            
            $this->redirect('/empresa/listar');
        } else {
            $this->redirect('/empresa/cadastrar');
        }
    }

    public function edicao($params)
    {
        $id = $params[0];  
        
        if(ctype_digit($id)){
            if(Sessao::existeFormulario()) {            
                $empresa = new Empresa();
                $empresa->setIdEmpresa(Sessao::retornaValorFormulario('idEmpresa'));
                $empresa->setNomeFantasia(Sessao::retornaValorFormulario('nomeFantasia'));
                $empresa->setRazaoSocial(Sessao::retornaValorFormulario('razaoSocial'));
                $empresa->setCNPJ(Sessao::retornaValorFormulario('CNPJ'));
                Sessao::limpaFormulario();
            } else {
                $empresaService = new EmpresaService(); 
                $empresa = $empresaService->listar($id)[0];                
            }

            if(is_null($empresa)) {
                throw new \Exception("Página não encontrada.", 404);
            } else {
                $this->setViewParam('empresa', $empresa);
                $this->render('/empresa/editar');
                Sessao::limpaErro();    
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
            $empresa = new Empresa();
            $empresa->setIdEmpresa(trim($_POST['idEmpresa']));
            $empresa->setNomeFantasia(trim($_POST['nomeFantasia']));
            $empresa->setRazaoSocial(trim($_POST['razaoSocial']));
            $empresa->setCNPJ(trim($_POST['CNPJ']));

            $empresaService = new EmpresaService();            

            if ($empresaService->editar($empresa)) {  
                $this->redirect('/empresa/listar');
            } else {  
                Sessao::gravaFormulario($_POST);
                $this->redirect('/empresa/edicao/' . $empresa->getIdEmpresa());
            } 
        }
    }

    public function exclusao($params)
    {
        $id = $params[0];

        if(ctype_digit($id)) {
            $empresaService = new EmpresaService();
            $empresa = $empresaService->listar($id)[0];

            if(is_null($empresa)) {                
                throw new \Exception("Página não encontrada.", 404); 
            } else {

                $vagas = $empresaService->listarVagasVinculadas($empresa);

                $this->setViewParam('empresa', $empresa);
                $this->setViewParam('vagas', $vagas);                               
                $this->render('/empresa/excluir');      
            }   

        } else {
            throw new \Exception("Página não encontrada.", 404);  
        }
    }

    public function excluir()
    {
        if(empty($_POST['idempresa'])) {
            throw new \Exception("Página não encontrada.", 404);  
        } else {
            $empresa = new Empresa();
            $empresa->setIdEmpresa($_POST['idempresa']);

            $empresaService = new EmpresaService();

            if ($empresaService->excluir($empresa)) {        
                $this->redirect('/empresa/listar');
            } else {
                $this->redirect('/empresa/exclusao/'.$empresa->getIdEmpresa());
            }              
        }    
    }
}