<?php

namespace App\Services;

use App\Lib\Sessao;
use App\Lib\Transacao;
use App\Lib\Exportar;

use App\Models\DAO\TecnologiaDAO;

use App\Models\Entidades\Vaga;
use App\Models\Entidades\Tecnologia;

use App\Models\Validacao\TecnologiaValidadorInserir;
use App\Models\Validacao\TecnologiaValidadorEditar;
use App\Models\Validacao\ResultadoValidacao;

class TecnologiaService
{
	public function listar($idTecnologia = null)
	{				
		$tecnologiaDAO = new TecnologiaDAO();		
		return $tecnologiaDAO->listar($idTecnologia);
	}	

	public function listarPorVaga(Vaga $vaga)
	{
		$tecnologiaDAO = new TecnologiaDAO();
		return $tecnologiaDAO->listarPorVaga($vaga->getIdVaga());
	}

	public function autoComplete(Tecnologia $tecnologia)
	{		
		$tecnologiaDAO = new TecnologiaDAO();
		$busca = $tecnologiaDAO->listarPorTecnologia($tecnologia);
		
		$exportar = new Exportar();			
		echo $exportar->exportarJSON($busca);	
	}

	public function listaPorTecnologia($tecnologia)
	{		
		$tecnologiaDAO = new TecnologiaDAO();
		$tecnologias = $tecnologiaDAO->listaPorTecnologia($tecnologia);
		return $tecnologias;
	}

	public function salvar(Tecnologia $tecnologia)
	{			
		$tecnologiaValidadorInserir = new TecnologiaValidadorInserir();
		$resultadoValidacao = $tecnologiaValidadorInserir->validar($tecnologia);

		if($resultadoValidacao->getErros())
		{
			Sessao::limpaErro();
			Sessao::gravaErro($resultadoValidacao->getErros());						
		} else {
			Sessao::gravaMensagem("Nova tecnologia cadastrada com sucesso.");
			Sessao::limpaFormulario();
			$tecnologiaDAO = new TecnologiaDAO();
			return $tecnologiaDAO->salvar($tecnologia);	
		}
		return false;
	}
	
	public function preencheTecnologias($arrayTecnologias)
	{
		$tecnologiaDAO = new TecnologiaDAO();
		$tecnologias = [];

		if(isset($arrayTecnologias)){
			foreach ($arrayTecnologias as $idTecnologia) 
			{			
				$tecnologias[] = $tecnologiaDAO->listar($idTecnologia)[0];	
			}
		}
		return $tecnologias;
	}
	
	public function excluirPorVaga(Vaga $vaga)
	{
		try
		{
			$tecnologiaDAO = new TecnologiaDAO();
			$tecnologiaDAO->excluirPorVaga($vaga->getIdVaga());					
		}
		catch (\Exception $e) 
		{			
			Sessao::gravaErro(['Erro ao excluir Tecnologias por vaga']);
		}		
	}

	public function editar(Tecnologia $novaTecnologia)
	{
		$tecnologiaDAO = new TecnologiaDAO();
		$tecnologiaValidadorEditar = new TecnologiaValidadorEditar();
		$tecnologiaCadastrada = $tecnologiaDAO->listar($novaTecnologia->getIdTecnologia())[0];
		$resultadoValidacao = $tecnologiaValidadorEditar->validar($novaTecnologia, $tecnologiaCadastrada);

		if($resultadoValidacao->getErros())
		{
			Sessao::limpaErro();
			Sessao::gravaErro($resultadoValidacao->getErros());						
		} else {			
			Sessao::limpaMensagem();		
			Sessao::gravaMensagem("Tecnologia atualizada com Sucesso!");
			
			return $tecnologiaDAO->editar($novaTecnologia);
		}
		return false;		
	}	

}