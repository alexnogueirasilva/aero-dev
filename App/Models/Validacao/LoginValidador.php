<?php 

namespace App\Models\Validacao;


use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Login;

class LoginValidador{

    public function validar(Login $login){

        $resultadoValidacao = new ResultadoValidacao();

        if(empty($login->getEmailLogin())){
            $resultadoValidacao->addErro('email', "Email: Este campo não pode ser vazio !");
        }

        if(empty($login->getPassoword())){
            $resultadoValidacao->addErro('Passoword', "Passoword: Este campo não pode ser vazio !");
        }
        return $resultadoValidacao;
    }
}



?>