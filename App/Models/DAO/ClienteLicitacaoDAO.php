<?php

namespace App\Models\DAO;

use App\Models\Entidades\ClienteLicitacao;
use App\Models\Entidades\Produto;

class ClienteLicitacaoDAO extends  BaseDAO
{

    public  function listar($codCliente = null)
    {

        if ($codCliente) {
            $resultado = $this->select(
                
                
                "SELECT * FROM clienteLicitacao WHERE licitacaoCliente_cod = $codCliente"
            );
            $dado = $resultado->fetch();

            if ($dado) {
                $clienteLicitacao = new ClienteLicitacao();
                $clienteLicitacao->setCodCliente($dado['licitacaoCliente_cod']);
                $clienteLicitacao->setRazaoSocial($dado['razaosocial']);
                $clienteLicitacao->setNomeFantasia($dado['nomefantasia']);
                $clienteLicitacao->setCnpj($dado['CNPJ']);
                $clienteLicitacao->setTrocaMarca($dado['trocamarca']);
                // $clienteLicitacao->setDataCadastro($dado['dataCadastro']);

                return $clienteLicitacao;
            }
        } else {

            $resultado = $this->select(
                ' SELECT * FROM clienteLicitacao '
            );
            $dados = $resultado->fetchAll();

            if ($dados) {

                $lista = [];

                foreach ($dados as $dado) {

                    $clienteLicitacao = new ClienteLicitacao();
                    $clienteLicitacao->setCodCliente($dado['licitacaoCliente_cod']);
                    $clienteLicitacao->setRazaoSocial($dado['razaosocial']);
                    $clienteLicitacao->setNomeFantasia($dado['nomefantasia']);
                    $clienteLicitacao->setCnpj($dado['CNPJ']);
                    $clienteLicitacao->setTrocaMarca($dado['trocamarca']);
                    // $clienteLicitacao->setDataCadastro($dado['dataCadastro']);

                    $lista[] = $clienteLicitacao;
                }
                return $lista;
            }
        }
        return false;
    }
    
    public  function listaClienteLicitacao2()
    {
        $resultado = $this->select(
            'SELECT * FROM cliente c INNER JOIN tipoCliente tp ON tp.codTipoCliente = c.idTipoCliente'
        );

        $dataSetclienteLicitacaos = $resultado->fetchAll();

        if ($dataSetclienteLicitacaos) {

            $listaClienteLicitacao2 = [];

            foreach ($dataSetclienteLicitacaos as $dataSetclienteLicitacao) {

                $clienteLicitacao = new ClienteLicitacao();
                $clienteLicitacao->setIdCliente($dataSetclienteLicitacao['idCliente']);
                $clienteLicitacao->setNome($dataSetclienteLicitacao['nome']);
                $clienteLicitacao->setNomeFantasia($dataSetclienteLicitacao['nomeFantasia']);
                $clienteLicitacao->getTipoCliente()->setNomeTipo($dataSetclienteLicitacao['nomeTipo']);

                $listaClienteLicitacao2[] = $clienteLicitacao;
            }
            return $listaClienteLicitacao2;
        }

        return false;
    }

    public function listaClienteLicitacao($idCliente = null)
    {

        if ($idCliente) {

            $resultado = $this->select(
                "SELECT * FROM cliente c INNER JOIN tipoCliente tp ON tp.codTipoCliente = c.tipoCliente WHERE c.idTipoCliente = $idCliente"
            );

            return $resultado->fetchObject(ClienteLicitacao::class);
        } else {
            $resultado = $this->select(
                'SELECT * FROM cliente c INNER JOIN tipoCliente tp ON tp.codTipoCliente = c.idTipoCliente '
            );

            return  $resultado->fetchAll(\PDO::FETCH_CLASS, ClienteLicitacao::class);
        }

        return false;
    }

    public function salvar(ClienteLicitacao $clienteLicitacao)
    {

        try {

            $razaoSocial    = $clienteLicitacao->getRazaoSocial();
            $nomeFantasia   = $clienteLicitacao->getNomeFantasia();
            $cnpj   = $clienteLicitacao->getCnpj();
            $trocaMarca     = $clienteLicitacao->getTrocaMarca();

            return $this->insert(
                'clienteLicitacao',
                ":razaosocial, :nomefantasia, :cnpj, :trocamarca",
                [
                    ":razaosocial"      => $razaoSocial,
                    ":nomeFantasia"     => $nomeFantasia,
                    ":cnpj"     => $cnpj,
                    ":trocamarca"       => $trocaMarca
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados:" . $e->getMessage(), 500);
        }
    }

    public function atualizar(ClienteLicitacao $clienteLicitacao)
    {
        try {

            $codCliente     = $clienteLicitacao->getCodCliente();
            $razaoSocial    = $clienteLicitacao->getRazaoSocial();
            $nomeFantasia   = $clienteLicitacao->getNomeFantasia();
            $cnpj           = $clienteLicitacao->getCnpj();
            $trocaMarca     = $clienteLicitacao->getTrocaMarca();

//echo " cod ".$codCliente." razao ".$razaoSocial." nome ".$nomeFantasia." cnpj ".$cnpj." marca ".$trocaMarca;
            return $this->update(
                'clienteLicitacao',
                "  razaoSocial=:razaoSocial, nomeFantasia=:nomeFantasia, cnpj=:cnpj, trocaMarca=:trocaMarca ",
                [
                    ':codCliente'       => $codCliente,
                    ':razaoSocial'      => $razaoSocial,
                    ':nomeFantasia'     => $nomeFantasia,
                    ':cnpj'             => $cnpj,
                    ':trocaMarca'       => $trocaMarca,
                ],
                "licitacaoCliente_cod = :codCliente"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro ao gravar dados " . $e->getMessage(), 500);
        }
    }

    public function excluir(ClienteLicitacao $clienteLicitacao)
    {
        try {

            $codCliente = $clienteLicitacao->getCodCliente();

            return $this->delete('clienteLicitacao', ":licitacaoCliente_cod = $codCliente");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao deletar" . $e->getMessage(), 500);
        }
    }
    
    
    public function listarPorNomeFantasia(ClienteLicitacao $clienteLicitacao)
    {
        $resultado = $this->select(
            "SELECT * FROM clienteLicitacao WHERE nomefantasia
                        LIKE '%".$clienteLicitacao->getNomeFantasia()."%' LIMIT 0.6"
        );
        return $resultado->fetchAll(\PDO::FETCH_ASSOC);
    }
    
}
