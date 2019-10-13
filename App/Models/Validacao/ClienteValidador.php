<?php 

namespace App\Models\Validacao;


use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Cliente;

class ClienteValidador{

    public function validar(Cliente $cliente){

        $resultadoValidacao = new ResultadoValidacao();

        if(empty($cliente->getNomeCliente())){
            $resultadoValidacao->addErro('nomeCliente', "Nome: Este campo não pode ser vazio !");
        }

        if(empty($cliente->getNomeFantasiaCliente())){
            $resultadoValidacao->addErro('nomeFantasiaCliente', "Nome fantasia do cliente: Este campo não pode ser vazio !");
        }
        return $resultadoValidacao;
    }
}



?>