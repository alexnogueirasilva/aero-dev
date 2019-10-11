<?php

namespace App\Models\DAO;

use App\Models\Entidades\Tecnologia;
use App\Models\Entidades\Vaga;

class TecnologiaDAO extends BaseDAO
{
    public  function listar($id = null)
    {
        if($id) 
        {
            $resultado = $this->select(
                "SELECT * FROM tecnologia WHERE idTecnologia = $id"
            );
        }
        else
        {
            $resultado = $this->select(
                'SELECT * FROM tecnologia'
            );
            
        }
        return $resultado->fetchAll(\PDO::FETCH_CLASS, Tecnologia::class);
    }

    public  function listarPorTecnologia(Tecnologia $tecnologia)
    {
        $resultado = $this->select(
            "SELECT * FROM tecnologia WHERE tecnologia 
             LIKE '%".$tecnologia->getTecnologia()."%' LIMIT 0,6"
        );
        return $resultado->fetchAll(\PDO::FETCH_ASSOC);        
    }
    

    public function listarPorVaga($id = null) 
    {
        if($id) 
        {
            $resultado = $this->select(
                "SELECT T.idtecnologia, 
                T.tecnologia 
                from tecnologiasporvaga V
                inner join tecnologia T on T.idtecnologia = V.FK_idtecnologia
                where FK_idvaga = $id"
            );            
        }
        return $resultado->fetchAll(\PDO::FETCH_CLASS, Tecnologia::class);       
    }

    public  function salvar(Tecnologia $tecnologia) 
    {
        try 
        {
            $nomeTecnologia = $tecnologia->getTecnologia();

            return $this->insert(
                'tecnologia',
                ":tecnologia",
                [
                    ':tecnologia' => $nomeTecnologia
                ]
            );
        }
        catch (\Exception $e)
        {
            throw new \Exception("Erro na gravação de dados", 500);
        }
    }

    public  function editar(Tecnologia $tecnologia) 
    {
        try 
        {
            $idTecnologia   = $tecnologia->getIdTecnologia();
            $tecnologia     = $tecnologia->getTecnologia();

            return $this->update(
                'tecnologia',
                "tecnologia = :tecnologia",
                [
                    ':idtecnologia'=>$idTecnologia,
                    ':tecnologia'=> $tecnologia

                ],
                "idtecnologia = :idtecnologia"
            );
        }
        catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function excluirPorVaga(Vaga $vaga)
    {
        try 
        {
            $id = $vaga->getIdVaga();
            return $this->delete('tecnologiasporvaga',"FK_idvaga = $id");
        }
        catch (Exception $e){
            throw new \Exception("Erro ao deletar as tecnologias por Vaga", 500);
        }
    }

    public  function verificaExistencia(Tecnologia $tecnologia)
    {   
        $resultado = $this->select(
            "SELECT count(*) FROM tecnologia WHERE tecnologia ='".$tecnologia->getTecnologia()."'"
        );
        return $resultado->fetchColumn();        
    }
}