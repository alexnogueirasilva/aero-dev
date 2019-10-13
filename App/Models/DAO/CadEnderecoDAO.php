<?php 

namespace App\Models\DAO;

use App\Models\Entidades\CadEndereco;
use App\Models\Entidades\enderecoCleinte;

class CadEnderecoDAO extends BaseDAO
{
    public function getById($codEndereco)
    {
        $resultado = $this->select(
            "SELECT codEndereco, logradouro FROM codCliente WHERE codCliente = $codEndereco"
        );

        return $resultado->fetchObject(CodCliente::class);
    }

    public function listarEndereco()
    {
        $resultado = $this->select(
            'SELECT codEndereco, logradouro FROM codCliente'
        );
        return $resultado->fetchAll(\PDO::FETCH_CLASS, CodCliente::class);
    }
/*
    public function getQuantidadeEndereco($codEndereco){
        if($codEndereco){
            $resultado = $this->select(
                "SELECT count(*) as total FROM enderecoCliente WHERE codCliente = $codEndereco"
            );
            return $resultado->fetch()['total'];
        }

        public public function salvarEndereco(EnderecoCleinte $enderecoCleinte)
        {

        }
    }*/
}

?>