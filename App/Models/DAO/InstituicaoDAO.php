<?php

namespace App\Models\DAO;

use App\Models\Entidades\Instituicao;
//use League\Flysystem\Exception;

class InstituicaoDAO extends BaseDAO
{

    public function listar($inst_id = null)
    {

        if ($codCliente) {

            $resultado = $this->select(
                "SELECT * FROM instituicao WHERE inst_id = $inst_id"
            );
            $dado = $resultado->fetch();

            if ($dado) {
                $instituicao = new Instituicao();
                $instituicao->setInst_Id($dado['inst_id']);
                $instituicao->setInst_Nome($dado['inst_nome']);
                $instituicao->setInst_Codigo($dado['inst_codigo']);
                $instituicao->setInst_Nome($dado['inst_nomeFansia']);

                return $instituicao;
            }
        } else {
            $resultado = $this->select(
                "SELECT * FROM instituicao ORDER BY inst_nome"
            );
            $dados = $resultado->fetchAll();
            if ($dados) {
                $lista = [];
                foreach ($dados  as $dado) {
                    $instituicao = new Instituicao();
                $instituicao->setInst_Id($dado['inst_id']);
                $instituicao->setInst_Nome($dado['inst_nome']);
                $instituicao->setInst_Codigo($dado['inst_codigo']);
                $instituicao->setInst_Nome($dado['inst_nomeFansia']);
                    $lista[] = $instituicao;
                }
                return $lista;
            }

            return false;
        }
    }

    public function salvar(Instituicao $instituicao) {

        try {

            $inst_nome          = $instituicao->getInst_Nome();
            $inst_codigo          = $instituicao->getInst_Codigo();
            $inst_nomeFantasia               = $instituicao->getNomeFantasia();

            $instituicao = new Instituicao();
            $instituicao->setInst_Nome($dado['inst_nome']);
            $instituicao->setInst_Codigo($dado['inst_codigo']);
            $instituicao->setInst_NomeFantasia($dado['inst_nomeFansia']);

            return $this->insert(
                'instituicao',
                ":inst_nome, :inst_codigo, :inst_nomeFansia, :status",
                [
                    ':inst_nome' => $inst_nome,
                    ':inst_codigo' => $inst_codigo,
                    ':inst_nomeFansia' => $inst_nomeFantasia
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação do dados", 500);
        }
    }

    public function atualizar(Instituicao $instituicao)
    {

        try {

            $inst_id            = $instituicao->getInst_Id();
            $inst_nome          = $instituicao->getInst_Nome();
            $inst_codigo        = $instituicao->getInst_Codigo();
            $inst_nomeFantasia  = $instituicao->getNomeFantasia();


            return $this->update(
                'instituicao',
                "inst_nome = :inst_nome, inst_codigo = :inst_codigo, inst_nomeFantasia = :inst_nomeFantasia",
                [
                    ':inst_nome'       => $inst_nome,
                    ':inst_codigo'      => $inst_codigo,
                    ':inst_nomeFantasia' => $inst_nomeFantasia
                ],
                "inst_id = :inst_id"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação do dados", 500);
        }
    }

    public function excluir(Instituicao $instituicao)
    {

        try {
            $inst_id = $cliente->getInst_Id();

            return $this->delete('instituicao', "inst_id = $inst_id");
        } catch (Exception $e) {
            throw new \Exception("Erro ao Deletar cliente", 500);
        }
    }
}
