<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Estado;

class EstadoValidador{

    public function validar(Estado $estado)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($estado->getEstNome()))
        {
            $resultadoValidacao->addErro('estNome',"Nome: Este campo não pode ser vazio");
        }
        if(empty($estado->getEstUf()))
        {
            $resultadoValidacao->addErro('estUf',"UF: Este campo não pode ser vazio");
        }
        
        return $resultadoValidacao;
    }
}