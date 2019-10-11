<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Vaga;

class VagaValidador{

	public function validar(Vaga $vaga)
	{
		$resultadoValidacao = new ResultadoValidacao();

		if(empty($vaga->getTitulo()))
		{
			$resultadoValidacao->addErro('titulo',"<b>Título:</b> Este campo não pode ser vazio");
		}

		if(empty($vaga->getDescricao()))
		{
			$resultadoValidacao->addErro('descricao',"<b>Descrição:</b> Este campo não pode ser vazio");
		}

		if(empty($vaga->getEmpresa()))
		{
			$resultadoValidacao->addErro('Empresa',"<b>Empresa:</b> Este campo não pode ser vazio");
		}

		if(empty($vaga->getTecnologias()))
		{
			$resultadoValidacao->addErro('Tecnologias',"<b>Tecnologias</b>: É necessário no mínimo 1 (uma) tecnologia");
		}

		if(count($vaga->getTecnologias()) > 3)
		{
			$resultadoValidacao->addErro('Tecnologias',"<b>Tecnologias</b>: Não é permitido mais que 3 tecnologias por vaga.");
		}
		return $resultadoValidacao;
	}
}