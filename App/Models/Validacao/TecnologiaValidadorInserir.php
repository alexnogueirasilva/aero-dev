<?php

namespace App\Models\Validacao;

use App\Models\Validacao\ResultadoValidacao;
use App\Models\Entidades\Tecnologia;
use App\Models\DAO\TecnologiaDAO;

class TecnologiaValidadorInserir{

	public function validar(Tecnologia $tecnologia)
	{
		$tecnologiaDAO = new TecnologiaDAO();
		$resultadoValidacao = new ResultadoValidacao();

		if(empty($tecnologia->getTecnologia()))
		{
			$resultadoValidacao->addErro('tecnologia',"<b>Tecnologia:</b> Este campo não pode ser vazio");
		}

		if($tecnologiaDAO->verificaExistencia($tecnologia) > 0){
			$resultadoValidacao->addErro('tecnologia',"<b>Tecnologia:</b> Já existe uma tecnologia com esse nome!");
		}
		
		return $resultadoValidacao;
	}
}