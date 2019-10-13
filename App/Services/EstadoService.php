<?php

namespace App\Services;

use App\Lib\Sessao;
use App\Lib\Transacao;
use App\Lib\Exportar;

use App\Models\DAO\EstadoDAO;


use App\Models\Validacao\EstadoValidador;
use App\Models\Validacao\ResultadoValidacao;
use App\Models\Entidades\Estado;


class EstadoService
{
    public function listar($estId = null)
    {
        $estadoDAO = new EstadoDAO();
        return $estadoDAO->listar($estId);
    }

    public function autoComplete(Estado $estado)
    { 
        $estadoDAO = new EstadoDAO();
        $busca = $estadoDAO->listaPorNome($estado);          
        $exportar = new Exportar();
        
        return $exportar->exportarJSON($busca);
    }

    public function autoComplete1(Estado $estado)
    { 
        $estadoDAO = new EstadoDAO();
        $busca = $estadoDAO->listaPorUf($estado);          
        $exportar = new Exportar();
        
        return $exportar->exportarJSON($busca);
    }
    
    public function listarEstadosVinculadas(Estado $estado)
    {
        $estadoDAO = new EstadoDAO();
        return $estadoDAO->listarEstadosVinculadas($estado);
    }

    public function salvar(Estado $estado)
    {
        $estadoValidador = new EstadoValidador();
       $resultadoValidacao = $estadoValidador->validar($estado);

        if ($resultadoValidacao->getErros()) {
            Sessao::limpaErro();
            Sessao::gravaErro($resultadoValidacao->getErros());
        } else {
            $estadoDAO = new empresaDAO();            
            $estadoDAO->salvar($estado);
            Sessao::gravaMensagem("cadastrado com sucesso.");
            Sessao::limpaFormulario();
            return true;
        }
        return false;
    }

    public function Editar(Estado $estado)
    {        
        $estadoDAO = new EstadoDAO();
        $estadoCadastrada = $estadoDAO->listar($estado->getIdEstado())[0];

        $estadoValidadorEditar = new EstadoValidadorEditar();
        $resultadoValidacao = $estadoValidadorEditar->validar($estado, $estadoCadastrada);

        if ($resultadoValidacao->getErros()) {
            Sessao::limpaErro();
            Sessao::gravaErro($resultadoValidacao->getErros());
        } else {
            Sessao::limpaFormulario(); 
            Sessao::limpaMensagem();           
            Sessao::gravaMensagem("Estado atualizada com sucesso!");
            $estadoDAO = new EstadoDAO();
            return $estadoDAO->editar($estado);
        }
        return false;
    }

    public function excluir(Estado $estado)
    {
        try {

            $transacao = new Transacao();
            $transacao->beginTransaction();
            
            $estadoDAO = new EstadoDAO();
            
            $estadoDAO->excluir($estado);
            $transacao->commit();            
            
            Sessao::limpaMensagem();
            Sessao::gravaMensagem("Estado Excluido com Sucesso!");
            return true;
        } catch (\Exception $e) {
            $transacao->rollBack();
            throw new \Exception(["Erro ao excluir cadastro"]);            
            return false;
        }
    }
}