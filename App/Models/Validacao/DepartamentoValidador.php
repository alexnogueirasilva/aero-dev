<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Departamento;

class DepartamentoValidador{

    public function validar(Departamento $departamento)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($departamento->getNome()))
        {
            $resultadoValidacao->addErro('nome',"Nome: Este campo não pode ser vazio");
        }
                
        return $resultadoValidacao;
    }
}