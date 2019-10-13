<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Status;

class StatusValidador{

    public function validar(Status $status)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($status->getNome()))
        {
            $resultadoValidacao->addErro('nome',"Nome: Este campo não pode ser vazio");
        }
       
        return $resultadoValidacao;
    }
}