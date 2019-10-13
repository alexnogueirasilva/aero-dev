<?php

namespace App\Models\DAO;

use App\Models\Entidades\Cidade;
use App\Models\Entidades\Estado;
use App\Models\Entidades\Usuario;

class CidadeDAO extends BaseDAO
{
    public  function listar($cidId = null)
    {        
        $SQL = " SELECT * 
                FROM cidade c
                INNER JOIN estado e ON e.estid = cidestado 
                INNER JOIN usuarios u ON u.id = c.cidusuario ";
            if($cidId) 
            {    
                $SQL.= " WHERE c.cidid = $cidId";
            }         
            
            $resultado = $this->select($SQL);
            
            $dados = $resultado->fetchAll();
                $lista = [];
                foreach ($dados as $dado) {

                    $cidade = new Cidade();
                    $cidade->setCidId($dado['cidid']);
                    $cidade->setCidNome($dado['cidnome']);
                    $cidade->setCidDataAlteracao($dado['ciddataalteracao']);
                    $cidade->setCidDataCadastro($dado['ciddatacadastro']);
                    $cidade->setEstado(new Estado());
                    $cidade->getEstado()->setEstId($dado['estid']);
                    $cidade->getEstado()->setEstNome($dado['estnome']);
                    $cidade->getEstado()->setEstUf($dado['estuf']);
                    $cidade->setUsuario(new Usuario());
                    $cidade->getUsuario()->setId($dado['id']);
                    $cidade->getUsuario()->setNome($dado['nome']);

                    $lista[] = $cidade;
                }

                return $lista;        
    }
    
    public function listarPorCidade($cidNome = null)
    {
        if($cidNome)
        {
            $resultado = $this->select(
                "SELECT * 
                FROM cidade c
                INNER JOIN estado e ON e.estid = cidestado 
                INNER JOIN usuarios u ON u.id = cidusuario WHERE c. = $cidNome"
            );
        }
        return $resultado->fetchAll(\PDO::FETCH_CLASS, Cidade::class);
    }

    public  function salvar(Cidade $cidade)
    {
        try {

            $cidNome            = $cidade->getCidNome();
            $cidUsuario         = $cidade->getUsuario()->getId();
            $cidEstado          = $cidade->getEstado()->getEstId();
            $date               = $cidade->getCidDataAlteracao();
            $date1              = $cidade->getCidDataCadastro();
            $cidDataCadastro    =   date_format($date1, 'Y-m-d H:i:s');
            $cidDataAlteracao    =   date_format($date, 'Y-m-d H:i:s');

            return $this->insert(
                'cidade',
                ":cidnome,:cidusuario,:cidestado,:ciddataalteracao,:ciddatacadastro",
                [
                    ':cidnome' => $cidNome,
                    ':cidusuario' => $cidUsuario,
                    ':cidestado' => $cidEstado,
                    ':ciddataalteracao' => $cidDataAlteracao,
                    ':ciddatacadastro' => $cidDataCadastro
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados. " . $e, 500);
        }
    }

    public  function listaPorNome(Cidade $cidade)
    {       
        $resultado = $this->select(
            "SELECT * FROM cidade WHERE cidnome 
             like '%".$cidade->getCidNome()."%' LIMIT 0,6 "
        );        
        return $resultado->fetchAll(\PDO::FETCH_ASSOC);        
    }

    public  function atualizar(Cidade $cidade)
    {
        try {
            
            $cidId         = $cidade->getCidId();
            $cidNome           = $cidade->getCidNome();
            $cidUsuario          = $cidade->getUsuario()->getId();
            $cidEstado          = $cidade->getEstado()->getEstId();
            $date               = $cidade->getCidDataAlteracao();
            $cidDataAlteracao =   date_format($date, 'Y-m-d H:i:s');
            var_dump($cidDataAlteracao);
            return $this->update(
                'cidade',
                "cidnome = :cidNome, cidusuario = :cidUsuario, 
                cidestado = :cidEstado, 
                ciddataalteracao = :cidDataAlteracao",
                [
                    ':cidId' => $cidId,
                    ':cidNome' => $cidNome,
                    ':cidUsuario' => $cidUsuario,
                    ':cidEstado' => $cidEstado,
                    ':cidDataAlteracao' => $cidDataAlteracao, 
                ],
                "cidid = :cidId"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados. ".$e, 500);
        }
    }

    public function excluir(Cidade $cidade)
    {
        try {
            $cidId = $cidade->getCidId();

            return $this->delete('cidade', "cidid = $cidId");
        } catch (Exception $e) {

            throw new \Exception("Erro ao deletar", 500);
        }
    }

}
