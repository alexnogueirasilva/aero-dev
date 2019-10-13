<?php

namespace App\Models\DAO;

use App\Models\Entidades\Estado;

class EstadoDAO extends BaseDAO
{
    public  function listar($estId = null)
    {

        if ($estId) {         
            $resultado = $this->select(
                " SELECT * FROM estado e INNER JOIN usuarios u ON u.id = e.estusuario WHERE e.estid = $estId "
            );
            $dado = $resultado->fetch();
            if ($dado) {
                $estado = new Estado();
                $estado->setEstId($dado['estid']);
                $estado->setEstNome($dado['estnome']);
                $estado->setEstUf($dado['estuf']);
                $estado->setEstUsuario($dado['estusuario']);
                $estado->getUsuario()->setNome($dado['nome']);
                
                return $estado;
            }
        } else {
            $resultado = $this->select(
                "SELECT * FROM estado e INNER JOIN usuarios u ON u.id = e.estusuario  ORDER BY e.estnome " 
            );
            $dados = $resultado->fetchAll();

            if ($dados) {

                $lista = [];

                foreach ($dados as $dado) {

                   $estado = new Estado();
                   $estado->setEstId($dado['estid']);
                   $estado->setEstNome($dado['estnome']);
                   $estado->setEstUf($dado['estuf']);
                   $estado->setEstUsuario($dado['estusuario']);
                   $estado->getUsuario()->setNome($dado['nome']);
                    $lista[] = $estado;
                }               
                return $lista;
            }
        }

        return false;
    }
    
    public function listaPorNome(Estado $estado)
    {
        $resultado = $this->select(
            "SELECT * FROM estado WHERE estnome 
            LIKE '%".$estado->getEstNome()."%' LIMIT 0,6"
        );
    
        return $resultado->fetchAll(\PDO::FETCH_ASSOC);
    }
   
    public function listaPorUf(Estado $estado)
    {
        $resultado = $this->select(
            "SELECT * FROM estado WHERE estnome 
            LIKE '%".$estado->getEstUf()."%' LIMIT 0,6"
        );
    
        return $resultado->fetchAll(\PDO::FETCH_ASSOC);
    }
   
     public  function salvar(Estado $estado)
    {
        try {

            $estNome          =$estado->getEstNome();
            $estUf          =$estado->getEstUf();
            $estUsuario          = $estado->getEstUsuario();

            return $this->insert(
                'estado',
                ":estnome, :estuf, :estusuario ",
                [
                    ':estnome' => $estNome,
                    ':estuf' => $estUf,
                    ':estusuario' => $estUsuario
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados. ", 500);
        }
    }

    public  function atualizar(Estado $estado){
        try {

            $estId             =$estado->getEstId();
            $estNome             =$estado->getEstNome();
            $estUf             =$estado->getEstUf();
            $estUsuario             =$estado->getEstUsuario();

            return $this->update(
                'estado',
                "estnome = :estNome, estuf = :estUf, estusuario = :estUsuario " ,
                [
                    ':estId' => $estId,
                    ':estNome' => $estNome,
                    ':estUf' => $estUf,
                    ':estUsuario' => $estUsuario,
                ],
                "estid = :estId"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados. ", 500);
        }
    }

    public function excluir(Estado $estado)
    {
        try {
            $estId =$estado->getEstId();

            return $this->delete('estado', "estid = $estId");
        } catch (Exception $e) {

            throw new \Exception("Erro ao deletar. ", 500);
        }
    }
}
