<?php

namespace App\Services;

use App\Lib\Sessao;
use App\Lib\Transacao;

use App\Models\DAO\VagaDAO;
use App\Models\DAO\TecnologiaDAO;

use App\Models\Validacao\VagaValidador;
use App\Models\Validacao\ResultadoValidacao;

use App\Models\Entidades\Vaga;
use App\Models\Entidades\Empresa;

class VagaService
{
    public function listar($idVaga = null)
    {
        $vagaDAO = new VagaDAO();
        return $vagaDAO->listar($idVaga);
    }

    public function editar(Vaga $vaga)
    {
        $vagaValidador = new VagaValidador();
        $resultadoValidacao = $vagaValidador->validar($vaga);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            return false;
        } else {

            try {
                $transacao = new Transacao();
                $transacao->beginTransaction();

                $tecnologiaDAO = new TecnologiaDAO();
                $tecnologiaDAO->excluirPorVaga($vaga);

                $vagaDAO = new VagaDAO();
                $vagaDAO->addTecnologia($vaga);
                $vagaDAO->editar($vaga);

                $transacao->commit();

                Sessao::limpaMensagem();
                Sessao::limpaFormulario();
                Sessao::gravaMensagem("Vaga atualizada com sucesso.");
                return true;
            } catch (\Exception $e) {
                $transacao->rollBack();
                Sessao::gravaErro(["Erro ao editar Vaga!"]);
                return false;
            }
        }
    }

    public function salvar(Vaga $vaga)
    {
        $transacao = new Transacao();
        $vagaValidador = new VagaValidador();
        $resultadoValidacao = $vagaValidador->validar($vaga);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());  
            return false;          
        } else {
            try {
                $vagaDAO = new VagaDAO();
                $transacao->beginTransaction();

                $id = $vagaDAO->salvar($vaga);
                $vaga->setIdVaga($id);
                $vagaDAO->addTecnologia($vaga);

                $transacao->commit();   

                Sessao::limpaFormulario();            
                Sessao::limpaMensagem();
                Sessao::gravaMensagem("Nova vaga Cadastrada com Sucesso.");
                return true;
            } catch (\Exception $e) {
                Sessao::gravaErro(['Erro ao gravar a Vaga']);
                $transacao->rollBack(); 
                return false;               
            }
        }        
    }

    public function excluir(Vaga $vaga)
    {

        $transacao = new Transacao(); 

        try {
                       
            $transacao->beginTransaction();

            $vagaDAO = new VagaDAO();
            $vagaDAO->excluirComRelacionamentos($vaga);
            $transacao->commit();  

            Sessao::limpaMensagem();
            Sessao::gravaMensagem("Vaga excluida com sucesso."); 
            return true;
        } catch (\Exception $e) {  
            Sessao::LimpaErro();          
            Sessao::gravaErro(['Erro ao excluir a Vaga']); 
            $transacao->rollBack();
            return false;
        }
    }

}