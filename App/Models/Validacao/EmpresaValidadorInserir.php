<?php

namespace App\Models\Validacao;

use App\Models\Entidades\Empresa;
use App\Models\DAO\EmpresaDAO;
use App\Models\Validacao\ResultadoValidacao;

class EmpresaValidadorInserir{

    public function validar(Empresa $empresa)
    {
        $empresaDAO = new EmpresaDAO();
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($empresa->getRazaoSocial()))
        {
            $resultadoValidacao->addErro('razaosocial',"<b>Razão Social:</b> Este campo não pode ser vazio");
        }
        
        if(empty($empresa->getNomeFantasia()))
        {
            $resultadoValidacao->addErro('nomefantasia',"<b>Nome Fantasia:</b> Este campo não pode ser vazio");
        }

        if(empty($empresa->getCNPJ()))
        {
            $resultadoValidacao->addErro('CNPJ',"<b>CNPJ:</b> Este campo não pode ser vazio");
        }

        if($empresaDAO->verificaExistenciaCNPJ($empresa) > 0)
        {
            $resultadoValidacao->addErro('CNPJ',"<b>CNPJ:</b> Já Existe uma empresa com esse CNPJ.");
        }

        if($empresaDAO->verificaExistenciaRazaoSocial($empresa) > 0)
        {
            $resultadoValidacao->addErro('Razão Social',"<b>Razão Social:</b> Já Existe uma empresa com essa Razão Social.");
        }

        if($empresaDAO->verificaExistenciaNomeFantasia($empresa) > 0)
        {
            $resultadoValidacao->addErro('Nome Fantasia',"<b>Nome Fantasia:</b> Já Existe uma empresa com esse Nome Fantasia.");
        }
        
        return $resultadoValidacao;
    }
}