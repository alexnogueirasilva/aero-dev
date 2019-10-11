<?php

namespace App\Models\DAO;

use App\Models\Entidades\Vaga;
use App\Models\Entidades\Empresa;
use App\Models\Entidades\Tecnologia;

class VagaDAO extends BaseDAO
{
    public  function listar($id = null) 
    {
        $SQL = "SELECT V.idvaga, 
        V.titulo, 
        V.descricao, 
        V.FK_idempresa, 
        E.idempresa, 
        E.razaosocial, 
        E.nomefantasia, 
        E.CNPJ 
        from vaga V 
        inner join empresa E on E.idempresa = V.FK_idempresa";

        if($id) 
        {    
            $SQL.= " where V.idvaga = $id";
        }         
        
        $resultado = $this->select($SQL);
        $dataSetVagas = $resultado->fetchAll();

        $listaVagas = [];

        foreach ($dataSetVagas as $dataSetVaga) 
        {
            $vaga = new Vaga();
            $vaga->setIdVaga($dataSetVaga['idvaga']);
            $vaga->setTitulo($dataSetVaga['titulo']);
            $vaga->setDescricao($dataSetVaga['descricao']);

            $vaga->setEmpresa(new Empresa());
            $vaga->getEmpresa()->setIdEmpresa($dataSetVaga['FK_idempresa']);
            $vaga->getEmpresa()->setNomeFantasia($dataSetVaga['nomefantasia']);
            $vaga->getEmpresa()->setRazaoSocial($dataSetVaga['razaosocial']);
            $vaga->getEmpresa()->setCNPJ($dataSetVaga['cnpj']);
            $listaVagas[] = $vaga;
        }
        return $listaVagas;       
    }

    
    public  function listarPorTecnologia($id = null)
    {
        $resultado = $this->select(
            "SELECT V.idvaga, V.titulo, T.tecnologia from tecnologiasporvaga TV
            inner join vaga V on V.idvaga = TV.FK_idvaga
            inner join tecnologia T on T.idtecnologia = TV.FK_idtecnologia 
            where T.idtecnologia = $id"
        );
        return $resultado->fetchAll(\PDO::FETCH_CLASS, Vaga::class);
    }   

    public  function salvar(Vaga $vaga) 
    {
        try
        {
            $titulo         = $vaga->getTitulo();
            $idEmpresa      = $vaga->getEmpresa()->getIdEmpresa();
            $descricao      = $vaga->getDescricao();

            return $this->insert(
                'Vaga',
                ":titulo,:FK_idempresa,:descricao",
                [
                    ':titulo' => $titulo,
                    ':FK_idempresa' => $idEmpresa,
                    ':descricao' => $descricao
                ]
            );
        }
        catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function addTecnologia(Vaga $vaga)
    {
        try 
        {
            $tecnologias = $vaga->getTecnologias();
            if(isset($tecnologias)){
                foreach ($tecnologias as $tecnologia) 
                {
                    $this->insert(
                        'tecnologiasporvaga',
                        ":FK_idvaga,:FK_idtecnologia",
                        [
                            ':FK_idvaga' => $vaga->getIdVaga(),
                            ':FK_idtecnologia' => $tecnologia->getIdTecnologia()
                        ]
                    );
                }   
            }
            return false;
        }
        catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public  function editar(Vaga $vaga) 
    {
        try 
        {
            $idVaga         = $vaga->getIdVaga();
            $titulo         = $vaga->getTitulo();
            $FK_idempresa   = $vaga->getEmpresa()->getIdEmpresa();
            $descricao      = $vaga->getDescricao();

            return $this->update(
                'vaga',
                "titulo = :titulo, FK_idempresa = :FK_idempresa, descricao = :descricao",
                [
                    ':idvaga'=> $idVaga,
                    ':titulo'=> $titulo,
                    ':FK_idempresa'=> $FK_idempresa,
                    ':descricao'=> $descricao

                ],
                "idvaga = :idvaga"
            );
        }
        catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function excluirComRelacionamentos(Vaga $vaga) 
    {
        try {   

            $id = $vaga->getIdVaga();
            $this->delete('tecnologiasporvaga',"FK_idvaga = $id");
            $this->delete('vaga',"idvaga = $id");   
                     
        } catch(\Exception $e) {
            throw new \Exception("Erro ao deletar", 500);
        }
    }
}