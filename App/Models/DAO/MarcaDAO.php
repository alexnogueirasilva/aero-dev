<?php

namespace App\Models\DAO;

use App\Models\Entidades\Marca;

class MarcaDAO extends BaseDAO
{
    public  function listar($codMarca = null)
    {

        if ($codMarca) {
            $resultado = $this->select(
                "SELECT * FROM marca WHERE marcacod = $codMarca "
            );
            $dado = $resultado->fetch();

            if ($dado) {
                $marca = new Marca();
                $marca->setMarcaCod($dado['marcacod']);
                $marca->setMarcaNome($dado['marcanome']);

                return $marca;
            }
        } else {
            $resultado = $this->select(
                "SELECT * FROM marca ORDER BY marcanome " 
            );
            $dados = $resultado->fetchAll();

            if ($dados) {

                $lista = [];

                foreach ($dados as $dado) {

                    $marca = new Marca();
                    $marca->setMarcaCod($dado['marcacod']);
                    $marca->setMarcaNome($dado['marcanome']);

                    $lista[] = $marca;
                }
                return $lista;
            }
        }

        return false;
    }
    

     public  function salvar(Marca $marca)
    {
        try {

            $marcaNome          =$marca->getMarcaNome();

            return $this->insert(
                'marca',
                ":marcanome ",
                [
                    ':marcanome' => $marcaNome
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados. ".$e, 500);
        }
    }

    public  function atualizar(Marca $marca){
        try {

            $marcaCod             =$marca->getMarcaCod();
            $marcaNome             =$marca->getMarcaNome();

            return $this->update(
                'marca',
                "marcanome = :marcaNome",
                [
                    ':marcaCod' => $marcaCod,
                    ':marcaNome' => $marcaNome,
                ],
                "marcacod = :marcaCod"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados. ".$e, 500);
        }
    }

    public function excluir(Marca $marca)
    {
        try {
            $marcaCod =$marca->getMarcaCod();

            return $this->delete('marca', "marcacod = $marcaCod");
        } catch (Exception $e) {

            throw new \Exception("Erro ao deletar. ".$e, 500);
        }
    }
}
