<?php

namespace App\Services;

use App\Lib\Sessao;
use App\Lib\Transacao;
use App\Lib\Exportar;

use App\Models\DAO\EmpresaDAO;
use App\Models\DAO\VagaDAO;
use App\Models\DAO\TecnologiaDAO;

use App\Models\Validacao\EmpresaValidadorInserir;
use App\Models\Validacao\EmpresaValidadorEditar;
use App\Models\Validacao\ResultadoValidacao;
use App\Models\Entidades\Empresa;

use App\Services\TecnologiaService;

class EmpresaService
{
    public function listar($idEmpresa = null)
    {
        $empresaDAO = new EmpresaDAO();
        return $empresaDAO->listar($idEmpresa);
    }

    public function autoComplete(Empresa $empresa)
    { 
        $empresaDAO = new EmpresaDAO();
        $busca = $empresaDAO->listaPorNomeFantasia($empresa);          
        $exportar = new Exportar();
        return $exportar->exportarJSON($busca);
    }
    
    public function listarVagasVinculadas(Empresa $empresa)
    {
        $empresaDAO = new EmpresaDAO();
        return $empresaDAO->listarVagasVinculadas($empresa);
    }

    public function salvar(Empresa $empresa)
    {
        $empresaValidadorInserir = new EmpresaValidadorInserir();
        $resultadoValidacao = $empresaValidadorInserir->validar($empresa);

        if ($resultadoValidacao->getErros()) {
            Sessao::limpaErro();
            Sessao::gravaErro($resultadoValidacao->getErros());
        } else {
            $empresaDAO = new empresaDAO();            
            $empresaDAO->salvar($empresa);
            Sessao::gravaMensagem("Nova empresa cadastrada com sucesso.");
            Sessao::limpaFormulario();
            return true;
        }
        return false;
    }

    public function Editar(Empresa $novaEmpresa)
    {        
        $empresaDAO = new EmpresaDAO();
        $empresaCadastrada = $empresaDAO->listar($novaEmpresa->getIdEmpresa())[0];

        $empresaValidadorEditar = new EmpresaValidadorEditar();
        $resultadoValidacao = $empresaValidadorEditar->validar($novaEmpresa, $empresaCadastrada);

        if ($resultadoValidacao->getErros()) {
            Sessao::limpaErro();
            Sessao::gravaErro($resultadoValidacao->getErros());
        } else {
            Sessao::limpaFormulario(); 
            Sessao::limpaMensagem();           
            Sessao::gravaMensagem("Empresa atualizada com sucesso!");
            $empresaDAO = new EmpresaDAO();
            return $empresaDAO->editar($novaEmpresa);
        }
        return false;
    }

    public function excluir(Empresa $empresa)
    {
        try {

            $transacao = new Transacao();
            $transacao->beginTransaction();
            
            $empresaDAO = new EmpresaDAO();
            $vagas = $empresaDAO->listarVagasVinculadas($empresa);

            if (isset($vagas)) {                
                $vagaDAO = new VagaDAO();
                foreach ($vagas as $vaga) {                    
                    $vagaDAO->excluirComRelacionamentos($vaga);          
                }
            }
            
            $empresaDAO->excluir($empresa);
            $transacao->commit();            
            
            Sessao::limpaMensagem();
            Sessao::gravaMensagem("Empresa Excluida com Sucesso!");
            return true;
        } catch (\Exception $e) {
            $transacao->rollBack();
            throw new \Exception(["Erro ao excluir a empresa"]);            
            return false;
        }
    }
}