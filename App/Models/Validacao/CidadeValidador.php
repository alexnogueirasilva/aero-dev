<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Cidade;

class CidadeValidador{

    public function validar(Cidade $cidade)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($cidade->getCidNome()))
        {
            $resultadoValidacao->addErro('cidNome',"Nome: Cide campo não pode ser vazio");
        }
        if(empty($cidade->getEstado()))
        {
            $resultadoValidacao->addErro('estado',"UF: Este campo não pode ser vazio");
        }
        
        return $resultadoValidacao;
    }
}