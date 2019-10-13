<?php

namespace App\Models\DAO;

use App\Models\Entidades\Cliente;
use League\Flysystem\Exception;

class ClienteDAO extends BaseDAO
{

    public function listar($codCliente = null)
    {

        if ($codCliente) {

            $resultado = $this->select(
                "SELECT * FROM cliente WHERE codCliente = $codCliente"
            );
            $dado = $resultado->fetch();

            if ($dado) {
                $cliente = new Cliente();
                $cliente->setCodCliente($dado['codCliente']);
                $cliente->setNomeCliente($dado['nomeCliente']);
                $cliente->setNomeFantasiaCliente($dado['nomeFantasiaCliente']);
                $cliente->setStatus($dado['status']);
                $cliente->setTipoCliente($dado['tipoCliente']);

                return $cliente;
            }
        } else {
            $resultado = $this->select(
                "SELECT * FROM cliente ORDER BY nomeCliente"
            );
            $dados = $resultado->fetchAll();
            if ($dados) {
                $lista = [];
                foreach ($dados  as $dado) {
                    $cliente = new Cliente();
                    $cliente->setCodCliente($dado['codCliente']);
                    $cliente->setNomeCliente($dado['nomeCliente']);
                    $cliente->setNomeFantasiaCliente($dado['nomeFantasiaCliente']);
                    $cliente->setStatus($dado['status']);
                    $cliente->setTipoCliente($dado['tipoCliente']);
                    $lista[] = $cliente;
                }
                return $lista;
            }

            return false;
        }
    }

    public function salvar(Cliente $cliente)
    {

        try {

            $nomeCliente          = $cliente->getNomeCliente();
            $nomeFantasiaCliente  = $cliente->getNomeFantasiaCliente();
            $tipoCliente          = $cliente->getTipoCliente();
            $status               = $cliente->getStatus();

            return $this->insert(
                'cliente',
                ":nomeCliente, :nomeFantasiaCliente, :tipoCliente, :status",
                [
                    ':nomeCliente' => $nomeCliente,
                    ':nomeFantasiaCliente' => $nomeFantasiaCliente,
                    ':tipoCliente' => $tipoCliente,
                    ':status' => $status
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação do dados", 500);
        }
    }

    public function atualizar(Cliente $cliente)
    {

        try {

            $codCliente           = $cliente->getCodCliente();
            $nomeCliente          = $cliente->getNomeCliente();
            $nomeFantasiaCliente  = $cliente->getNomeFantasiaCliente();
            $tipoCliente          = $cliente->getTipoCliente();
            $status               = $cliente->getStatus();

            return $this->update(
                'cliente',
                "nomeCliente = :nomeCliente, nomeFantasiaCliente = :nomeFantasiaCliente, tipoCliente = :tipoCliente, status = :status",
                [
                    ':codCliente'       => $codCliente,
                    ':nomeCliente'      => $nomeCliente,
                    ':nomeFantasiaCliente' => $nomeFantasiaCliente,
                    ':tipoCliente'              => $tipoCliente,
                    ':status'              => $status

                ],
                "codCliente = :codCliente"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação do dados", 500);
        }
    }

    public function excluir(Cliente $cliente)
    {

        try {
            $codCliente = $cliente->getCodCliente();

            return $this->delete('cliente', "codCliente = $codCliente");
        } catch (Exception $e) {
            throw new \Exception("Erro ao Deletar cliente", 500);
        }
    }
    
    public function listarPorNomeFantasia(Cliente $cliente)
    {
        $resultado = $this->select(
            "SELECT * FROM cliente WHERE nomeFantasiaCliente 
            LIKE '%".$cliente->getNomeFantasiaCliente()."%' LIMIT 0,6"
        );
        return $resultado->fetchAll(\PDO::FETCH_ASSOC);
    }
}
