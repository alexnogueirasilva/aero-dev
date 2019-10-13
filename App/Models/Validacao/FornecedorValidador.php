<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Fornecedor;

class FornecedorValidador{

    public function validar(Fornecedor $fornecedor)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($fornecedor->getForRazaoSocial()))
        {
            $resultadoValidacao->addErro('proRazaoSocial',"Razao Social: Este campo não pode ser vazio");
        }
        if(empty($fornecedor->getForNomeFantasia()))
        {
            $resultadoValidacao->addErro('proNomeFantasia',"Nome Fantasia: Este campo não pode ser vazio");
        }
        
        if(empty($fornecedor->getForCnpj()))
        {
            $resultadoValidacao->addErro('forCnpj',"CNPJ: Este campo não pode ser vazio");
        }


        return $resultadoValidacao;
    }
}