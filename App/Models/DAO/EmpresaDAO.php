<?php

namespace App\Models\DAO;

use App\Models\Entidades\Empresa;
use App\Models\Entidades\Vaga;

class EmpresaDAO extends BaseDAO
{
    public  function listar($id = null)
    {
        if(isset($id)) 
        {
            $resultado = $this->select(
                "SELECT * FROM empresa WHERE idEmpresa = $id"
            );           
        }
        else
        {
            $resultado = $this->select(
                'SELECT * FROM empresa'
            );            
        }
        return $resultado->fetchAll(\PDO::FETCH_CLASS, Empresa::class);
    }

    public  function listaPorNomeFantasia(Empresa $empresa)
    {       
        $resultado = $this->select(
            "SELECT * FROM empresa WHERE nomefantasia 
             like '%".$empresa->getNomeFantasia()."%' LIMIT 0,6 "
        );        
        return $resultado->fetchAll(\PDO::FETCH_ASSOC);        
    }

    public  function salvar(Empresa $empresa) 
    {
        try 
        {

            $nomeFantasia   = $empresa->getNomeFantasia();
            $razaoSocial    = $empresa->getRazaoSocial();
            $CNPJ           = $empresa->getCNPJ();

            return $this->insert(
                'empresa',
                ":nomefantasia,:razaosocial,:CNPJ",
                [
                    ':nomefantasia'=>$nomeFantasia,
                    ':razaosocial'=>$razaoSocial,
                    ':CNPJ'=>$CNPJ
                ]
            );

        }

        catch (\Exception $e)
        {
            throw new \Exception("Erro na gravação de dados.");
        }
    }

    public  function editar(Empresa $empresa) 
    {
        try 
        {

            $idEmpresa      = $empresa->getIdEmpresa();
            $nomeFantasia   = $empresa->getNomeFantasia();
            $razaoSocial    = $empresa->getRazaoSocial();
            $CNPJ           = $empresa->getCNPJ();

            
            return $this->update(
                'empresa',
                "nomefantasia = :nomefantasia, razaosocial = :razaosocial, CNPJ = :CNPJ",
                [
                    ':idempresa' => $idEmpresa,
                    ':nomefantasia' => $nomeFantasia,
                    ':razaosocial' => $razaoSocial,
                    ':CNPJ' => $CNPJ
                ],
                "idempresa = :idempresa"
            );
        }

        catch (Exception $e)
        {
            throw new Exception("Erro na gravação de dados.");
        }
    }

    public  function listarVagasVinculadas(Empresa $empresa)
    {     
        $id = $empresa->getIdEmpresa();
        $resultado = $this->select(
            "SELECT * FROM vaga where FK_idempresa = $id"
        );
        return $resultado->fetchAll(\PDO::FETCH_CLASS, Vaga::class);
    }

    public function excluir(Empresa $empresa)
    {
        try 
        {
            $id = $empresa->getIdEmpresa();

            return $this->delete('empresa',"idEmpresa = $id");

        }
        catch (Exception $e)
        {
            throw new Exception("Erro ao deletar");
        }
    }

    public  function verificaExistenciaCNPJ(Empresa $empresa)
    {   
        $resultado = $this->select(
            "SELECT count(*) FROM empresa WHERE CNPJ ='".$empresa->getCNPJ()."'"
        );
        return $resultado->fetchColumn();        
    }

    public  function verificaExistenciaRazaoSocial(Empresa $empresa)
    {   
        $resultado = $this->select(
            "SELECT count(*) FROM empresa WHERE razaoSocial ='".$empresa->getRazaoSocial()."'"
        );
        return $resultado->fetchColumn();        
    }

    public  function verificaExistenciaNomeFantasia(Empresa $empresa)
    {   
        $resultado = $this->select(
            "SELECT count(*) FROM empresa WHERE nomefantasia ='".$empresa->getNomeFantasia()."'"
        );
        return $resultado->fetchColumn();        
    }
}