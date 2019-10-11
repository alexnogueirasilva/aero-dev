<?php

namespace App\Models\Validacao;

use App\Models\Validacao\ResultadoValidacao;
use App\Models\Entidades\Tecnologia;
use App\Models\DAO\TecnologiaDAO;

class TecnologiaValidadorEditar{

	public function validar(Tecnologia $tecnologia, Tecnologia $tecnologiaAtual)
	{
		$tecnologiaDAO = new TecnologiaDAO();
		$resultadoValidacao = new ResultadoValidacao();

		if($tecnologia == $tecnologiaAtual) {
			$resultadoValidacao->addErro('Tecnologia','<b>A Entrada de dados permanece a mesma que a Tecnologia cadastrada!</b>');
		}

		if($tecnologia->getTecnologia() != $tecnologiaAtual->getTecnologia()){
			if(empty($tecnologia->getTecnologia()))
			{
				$resultadoValidacao->addErro('tecnologia',"<b>Tecnologia:</b> Este campo não pode ser vazio");
			}elseif($tecnologiaDAO->verificaExistencia($tecnologia) > 0){
				$resultadoValidacao->addErro('tecnologia',"<b>Tecnologia:</b> Já existe uma tecnologia com esse nome!");
			}
		}

		return $resultadoValidacao;
	}
}