<?php 

namespace App\Models\Validacao;


use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\ClienteLicitacao;

class ClienteLicitacaoValidador{

    public function validar(ClienteLicitacao $clienteLicitacao){

        $resultadoValidacao = new ResultadoValidacao();

        if(empty($clienteLicitacao->getRazaoSocial())){
            $resultadoValidacao->addErro('razaoSocial', "Razao social do cliente: Este campo não pode ser vazio !");
        }

        if(empty($clienteLicitacao->getNomeFantasia())){
            $resultadoValidacao->addErro('nomeFantasia', "Nome fantasia do cliente: Este campo não pode ser vazio !");
        }
        if(empty($clienteLicitacao->getCnpj())){
            $resultadoValidacao->addErro('cnpj', "CNPJ do cliente: Este campo não pode ser vazio !");
        }
        return $resultadoValidacao;
    }
}



?>