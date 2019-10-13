<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use App\Models\Entidades\Pedido;

class PedidoValidador{

    public function validar(Pedido $pedido)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($pedido->getNumeroAF()))
        {
            $resultadoValidacao->addErro('numeroAf',"Numero do pedido: Este campo não pode ser vazio");
        }               

        return $resultadoValidacao;
    }
}