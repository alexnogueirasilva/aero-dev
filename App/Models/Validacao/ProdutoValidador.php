<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Produto;

class ProdutoValidador{

    public function validar(Produto $produto)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($produto->getProNome()))
        {
            $resultadoValidacao->addErro('proNome',"Nome: Este campo não pode ser vazio");
        }
        
        if(empty($produto->getProNomeComercial()))
        {
            $resultadoValidacao->addErro('proNomeComercial',"Nome Comercial: Este campo não pode ser vazio");
        }

        if(empty($produto->getProMarca()))
        {
            $resultadoValidacao->addErro('proMarca',"Marca: Este campo não pode ser vazio");
        }

        if(empty($produto->getProFornecedor()))
        {
            $resultadoValidacao->addErro('proFornecedor',"Fornecedor: Este campo não pode ser vazio");
        }

        return $resultadoValidacao;
    }
}