<?php

namespace App\Models\Validacao;

use App\Models\Validacao\ResultadoValidacao;
use App\Models\Entidades\Empresa;
use App\Models\DAO\EmpresaDAO;

class EmpresaValidadorEditar {

    public function validar(Empresa $novaEmpresa, Empresa $empresaCadastrada)
    {

        $empresaDAO = new EmpresaDAO();
        $resultadoValidacao = new ResultadoValidacao();

        if($novaEmpresa == $empresaCadastrada) {
            $resultadoValidacao->addErro('Empresa','<b>A Entrada de dados permanece a mesma que a Empresa cadastrada!</b>');
        }

        if($novaEmpresa->getNomeFantasia() != $empresaCadastrada->getNomeFantasia()){
            if(empty($novaEmpresa->getNomeFantasia()))
            {
                $resultadoValidacao->addErro('nomefantasia',"<b>Nome Fantasia:</b> Este campo não pode ser vazio");
            }elseif ($empresaDAO->verificaExistenciaNomeFantasia($novaEmpresa) > 0) {
                $resultadoValidacao->addErro('Nome Fantasia',"<b>Nome Fantasia:</b> Já Existe uma empresa com esse Nome Fantasia.");    
            } 
        }

        if($novaEmpresa->getRazaoSocial() != $empresaCadastrada->getRazaoSocial())   {
            if(empty($novaEmpresa->getRazaoSocial())){
                $resultadoValidacao->addErro('razaosocial',"<b>Razão Social:</b> Este campo não pode ser vazio");    
            }
            elseif($empresaDAO->verificaExistenciaRazaoSocial($novaEmpresa) > 0)
            {
                $resultadoValidacao->addErro('Razão Social',"<b>Razão Social:</b> Já Existe uma empresa com essa Razão Social.");
            }
        }  

        if($novaEmpresa->getCNPJ() != $empresaCadastrada->getCNPJ()){
            if(empty($novaEmpresa->getCNPJ())){
                $resultadoValidacao->addErro('CNPJ',"<b>CNPJ:</b> Este campo não pode ser vazio");
            }
            elseif($empresaDAO->verificaExistenciaCNPJ($novaEmpresa) > 0)
            {
                $resultadoValidacao->addErro('CNPJ',"<b>CNPJ:</b> Já Existe uma empresa com esse CNPJ.");                
            }
        }
        return $resultadoValidacao;
    }
}