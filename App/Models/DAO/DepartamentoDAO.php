<?php

namespace App\Models\DAO;

use App\Models\Entidades\Departamento;

class DepartamentoDAO extends BaseDAO
{

    public function listar($id = null){
        if ($id) {

            $resultado = $this->select(
                "SELECT * FROM departamentos d
                inner join instituicao i on i.inst_codigo = d.fk_idInstituicao WHERE id = $id"
            );
            $dado = $resultado->fetch();

            if ($dado) {
                $departamento = new Departamento();
                $departamento->setId($dado['id']);
                $departamento->setNome($dado['nome']);
                $departamento->getInstituicao()->setInst_Codigo($dado['inst_codigo']);
               // $departamento->getFk_IdInstituicao($dado['inst_codigo']);
                $departamento->setFk_IdInstituicao($dado['fk_idInstituicao']);
                return $departamento;
            }
        } else {
            $resultado = $this->select(
                "SELECT * FROM departamentos d
                inner join instituicao i on i.inst_codigo = d.fk_idInstituicao ORDER BY d.nome"
            );
            $dados = $resultado->fetchAll();
            if ($dados) {
                $lista = [];
                foreach ($dados  as $dado) {
                
                $departamento = new Departamento();
                $departamento->setId($dado['id']);
                $departamento->setNome($dado['nome']);
                $departamento->setFk_IdInstituicao($dado['inst_codigo']);
                $departamento->getInstituicao()->setInst_Codigo($dado['inst_codigo']);

                    $lista[] = $departamento;
                }
                return $lista;
            }

            return false;
        }
    }

    public  function salvar(Departamento $departamento) 
    {
        try {

            $nome           = $departamento->getNome();
            $fk_instituicao = $departamento->getInstituicao()->getInst_Codigo();
            

            return $this->insert(
                'departamentos',
                ":nome,:fk_idInstituicao",
                [
                    ':nome'=>$nome,
                    ':fk_idInstituicao' => $fk_instituicao

                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public  function atualizar(Departamento $departamento) 
    {
        try {

            $id             = $departamento->getId();
            $nome           = $departamento->getNome();
            $fk_instituicao = $departamento->getFk_IdInstituicao();

            return $this->update(
                'departamentos',
                "nome = :nome, fk_idInstituicao =:fk_instituicao",
                [
                    ':id'=>$id,
                    ':nome'=>$nome,
                   ':fk_instituicao'=>$fk_instituicao,
                ],
                "id = :id"
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados. ", 500);
        }
    }

    public function excluir(Departamento $departamento)
    {
        try {
            $id = $departamento->getId();

            return $this->delete('departamentos',"id = $id");

        }catch (Exception $e){

            throw new \Exception("Erro ao deletar", 500);
        }
    }
}