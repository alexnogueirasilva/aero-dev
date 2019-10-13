<?php

namespace App\Models\DAO;

use App\Models\Entidades\Fornecedor;

class FornecedorDAO extends BaseDAO
{
    public  function listar($fornecedor_cod = null)
    {

        if ($fornecedor_cod) {
            $resultado = $this->select(
                "SELECT * FROM fornecedor WHERE fornecedor_cod = $fornecedor_cod"
            );
            $dado = $resultado->fetch();

            if ($dado) {
                $fornecedor = new Fornecedor();
                $fornecedor->setFornecedor_Cod($dado['fornecedor_cod']);
                $fornecedor->setForRazaoSocial($dado['razaosocial']);
                $fornecedor->setForNomeFantasia($dado['nomefantasia']);
                $fornecedor->setForCnpj($dado['CNPJ']);
                //$fornecedor->setForDataCadastro($dado['dataCadastro']);

                return $fornecedor;
            }
        } else {

            $resultado = $this->select(
                "SELECT * FROM fornecedor ORDER BY razaoSocial"
            );
            $dados = $resultado->fetchAll();

            if ($dados) {

                $lista = [];

                foreach ($dados as $dado) {

                    $fornecedor = new Fornecedor();
                   $fornecedor->setFornecedor_Cod($dado['fornecedor_cod']);
                   $fornecedor->setForRazaoSocial($dado['razaosocial']);
                   $fornecedor->setForNomeFantasia($dado['nomefantasia']);
                   $fornecedor->setForCnpj($dado['CNPJ']);
                   //$fornecedor->setForDataCadastro($dado['dataCadastro']);
                   
                    $lista[] = $fornecedor;
                }
             
                return $lista;
            }
           
        }

        return false;
    }
    public  function qtde()
    {
        $resultado = $this->select(
            "SELECT COUNT(*) FROM fornecedor"
        );
        $fornecedor = $resultado->fetch();

        return $fornecedor;

        if ($fornecedor) {

            return $fornecedor;
        }

        return false;
    }
    public  function qtde1()
    {
        $resultado = $this->select(
            // "SELECT COUNT(*) FROM fornecedor"
            "SELECT R.codFornecedor,R.razaoSocial, R.qtdePedidos FROM (
                SELECT DISTINCT f.razaoSocial, f.codFornecedor,
                (SELECT COUNT(p.nome) AS qtde
                FROM produto AS p 
                WHERE f.codFornecedor = p.fornecedor_id
                ) as qtdePedidos FROM fornecedor as f ) AS R
                WHERE R.qtdePedidos > 0
                 ORDER BY R.qtdePedidos DESC "
        );
        $dados = $resultado->fetchAll();

        /*if ($dados) {

            $lista = [];

            foreach ($dados as $dado) {

                $fornecedor = new Fornecedor();
                //  $fornecedor->setCodFornecedor($dado['codFornecedor']);
                $fornecedor->setCodFornecedor($dado['qtdePedidos']);
                $fornecedor->setRazaoSocial($dado['razaoSocial']);
                //  $fornecedor->setNomeFantasia($dado['nomeFantasia']);
                //  $fornecedor->setCnpj($dado['cnpj']);
                $fornecedor->$dado['qtdePedidos'];

                $lista[] = $fornecedor;
            }
            return $lista;
            
    }*/
        return $dados;
        // return false;
    }


    public  function salvar(Fornecedor $fornecedor)
    {
        try {

            $nomeFantasia   = $fornecedor->getForNomeFantasia();
            $razaoSocial    = $fornecedor->getForRazaoSocial();
            $cnpj           = $fornecedor->getForCnpj();

            return $this->insert(
                'fornecedor',
                ":razaosocial,:nomefantasia,:CNPJ",
                [
                    ':razaosocial' => $razaoSocial,
                    ':nomefantasia' => $nomeFantasia,
                    ':CNPJ' => $cnpj
                ]
            );
        } catch (\Exception $e) {
            
            throw new \Exception("Erro na gravação de dados. ".$e, 500);
        }
    }

    public  function atualizar(Fornecedor $fornecedor)
    {
        try {

            $codFornecedor  = $fornecedor->getFornecedor_Cod();
            $nomeFantasia   = $fornecedor->getForNomeFantasia();
            $razaoSocial    = $fornecedor->getForRazaoSocial();
            $cnpj           = $fornecedor->getForCnpj();

            return $this->update(
                'fornecedor',
                "razaoSocial = :razaoSocial, nomeFantasia = :nomeFantasia, cnpj = :cnpj",
                [
                    ':fornecedor_cod' => $codFornecedor,
                    ':razaoSocial' => $nomeFantasia,
                    ':nomeFantasia' => $razaoSocial,
                    ':cnpj' => $cnpj,
                ],
                "fornecedor_cod = :fornecedor_cod"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados. ".$e, 500);
        }
    }

    public function excluir(Fornecedor $fornecedor)
    {
        try {
            $codFornecedor = $fornecedor->getFornecedor_Cod();

            return $this->delete('fornecedor', "fornecedor_cod = $codFornecedor");
        } catch (Exception $e) {

            throw new \Exception(" Erro ao deletar ", 500);
        }
    }
}
