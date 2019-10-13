<?php

namespace App\Services;

use App\Lib\Sessao;
use App\Lib\Transacao;
use App\Lib\Exportar;

use App\Models\DAO\CidadeDAO;
use App\Models\DAO\EstadoDAO;


use App\Models\Validacao\CidadeValidador;
use App\Models\Validacao\ResultadoValidacao;
use App\Models\Entidades\Cidade;


class CidadeService
{
    public function listar($cidId = null)
    {
        
        $cidadeDAO = new CidadeDAO();
        return $cidadeDAO->listar($cidId);
    }

    public function autoComplete(Cidade $cidade)
    { 
        $cidadeDAO = new CidadeDAO();
        $busca = $cidadeDAO->listaPorNome($cidade);          
        $exportar = new Exportar();
        return $exportar->exportarJSON($busca);
    }
    
    public function listarEstadosVinculadas(Cidade $cidade)
    {
        $cidadeDAO = new CidadeDAO();
        return $cidadeDAO->listarEstadosVinculadas($cidade);
    }

    public function salvar(Cidade $cidade)
    {
        $transacao = new Transacao();
        $cidadeValidador = new CidadeValidador();
        $resultadoValidacao = $cidadeValidador->validar($cidade);

        if ($resultadoValidacao->getErros()) {
            Sessao::limpaErro();
            Sessao::gravaErro($resultadoValidacao->getErros());
        } else {
            try{
                $transacao->beginTransaction();
                $cidadeDAO = new CidadeDAO();            
                $cidadeDAO->salvar($cidade);
                $transacao->commit(); 
                Sessao::gravaMensagem("cadastro realizado com sucesso!.");
                Sessao::limpaFormulario();
                return true;
            }catch(\Exception $e){
                Sessao::gravaMensagem("Erro ao tentar cadastrar.");
                $transacao->rollBack(); 
                return false;
            }
        }
    }

    public function Editar(Cidade $cidade)
    {        
        //$cidadeDAO = new CidadeDAO();
       // $cidade = $cidadeDAO->listar($cidade->getCidId())[0];

        $cidadeValidador = new CidadeValidador();
        $resultadoValidacao = $cidadeValidador->validar($cidade);

        if ($resultadoValidacao->getErros()) {
            Sessao::limpaErro();
            Sessao::gravaErro($resultadoValidacao->getErros());
        } else {
            Sessao::limpaFormulario(); 
            Sessao::limpaMensagem();           
            Sessao::gravaMensagem("Cadastro atualizado com sucesso! ");
            $cidadeDAO = new CidadeDAO();
            return $cidadeDAO->atualizar($cidade);
        }
        return false;
    }

    public function excluir(Cidade $cidade)
    {
        try {

            $transacao = new Transacao();
            $transacao->beginTransaction();
            
            $cidadeDAO = new CidadeDAO();
           // $vagas = $cidadeDAO->listarEstadosVinculadas($cidade);
                        
            $cidadeDAO->excluir($cidade);
            $transacao->commit();            
            
            Sessao::limpaMensagem();
            Sessao::gravaMensagem("Cidade Excluida com Sucesso!");
            return true;
        } catch (\Exception $e) {
            $transacao->rollBack();
            throw new \Exception(["Erro ao excluir a empresa"]);            
            return false;
        }
    }
}