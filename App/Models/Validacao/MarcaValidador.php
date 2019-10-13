<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Marca;

class MarcaValidador{

    public function validar(Marca $marca)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($marca->getMarcaNome()))
        {
            $resultadoValidacao->addErro('marcaNome',"Nome: Este campo não pode ser vazio");
        }
        
        return $resultadoValidacao;
    }
}