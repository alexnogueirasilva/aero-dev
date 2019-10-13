<?php

namespace App\Models\DAO;

use App\Models\Entidades\Sla;

class SlaDAO extends BaseDAO
{
    public  function listar($id = null) {

        if ($id) {
            $resultado = $this->select(
                "SELECT * FROM tbl_sla WHERE id = $id"
            );
            $dado = $resultado->fetch();

            if ($dado) {
               $sla = new Sla();
               $sla->setId($dado['id']);
               $sla->setDescricao($dado['descricao']);
               $sla->setTempo($dado['tempo']);
               $sla->setUniTempo($dado['unitempo']);
               $sla->setFk_Instituicao($dado['fk_idInstituicao']);

                return $sla;
            }
        } else {

            $resultado = $this->select(
                "SELECT * FROM tbl_sla ORDER BY descricao"
            );
            $dados = $resultado->fetchAll();

            if ($dados) {

                $lista = [];

                foreach ($dados as $dado) {

                   $sla = new Sla();
                   $sla->setId($dado['id']);
                   $sla->setDescricao($dado['descricao']);
                   $sla->setTempo($dado['tempo']);
                   $sla->setUniTempo($dado['unitempo']);
                   $sla->setFk_Instituicao($dado['fk_idInstituicao']);

                    $lista[] = $sla;
                }
                
                return $lista;
            }
        }

        return false;
    }

    public  function salvar(Sla $sla)
    {
        try {

            $tempo          =$sla->getTempo();
            $descricao      =$sla->getDescricao();
            $fk_instituicao =$sla->getFk_Instituicao();
            $uniTempo       =$sla->getUniTempo();

            return $this->insert(
                'tbl_sla',
                ":descricao,:unitempo,:tempo",
                [
                    ':descricao' => $descricao,
                    ':tempo' => $tempo,
                    ':unitempo' => $uniTempo,
                    ':fk_idInstituicao' => $fk_instituicao
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public  function atualizar(Sla $sla){
        try {

            $id             =$sla->getId();
            $tempo          =$sla->getTempo();
            $descricao      =$sla->getDescricao();
            $fk_instituicao  =$sla->getFk_Instituicao();
            $uniTempo        =$sla->getUniTempo();

            return $this->update(
                'tbl_sla',
                "descricao = :descricao, fk_idInstituicao = :fk_instituicao, tempo = :tempo, unitempo = :uniTempo",
                [
                    ':id' => $id,
                    ':descricao' => $descricao,
                    ':tempo' => $tempo,
                    ':uniTempo' => $uniTempo,
                    ':fk_instituicao' => $fk_instituicao,
                ],
                "id = :id"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados. ", 500);
        }
    }

    public function excluir(Sla $sla)
    {
        try {
            $id =$sla->getId();

            return $this->delete('tbl_sla', "id = $id");
        } catch (Exception $e) {

            throw new \Exception("Erro ao deletar", 500);
        }
    }
}
