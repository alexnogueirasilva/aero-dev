<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Sla;

class SlaValidador{

    public function validar(Sla $sla)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($sla->getDescricao()))
        {
            $resultadoValidacao->addErro('descricao',"Descricao: Este campo não pode ser vazio");
        }
        
        if(empty($sla->getTempo()))
        {
            $resultadoValidacao->addErro('tempo',"Tempo: Este campo não pode ser vazio");
        }


        return $resultadoValidacao;
    }
}