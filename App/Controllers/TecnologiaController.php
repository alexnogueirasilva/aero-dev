<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Lib\Exportar;

use App\Models\Entidades\Tecnologia;
use App\Services\TecnologiaService;

class TecnologiaController extends Controller
{
	public function listar()
	{		
		$tecnologiaService = new TecnologiaService();
		$tecnologias = $tecnologiaService->listar();

		$this->setViewParam('tecnologias',$tecnologias);
		$this->render('/tecnologia/listar');

		Sessao::limpaMensagem();		
	}

	public function autoComplete($params)
	{
		$tecnologiaService = new TecnologiaService();	
		
		$tecnologia = new Tecnologia();
		$tecnologia->setTecnologia($params[0]);	

		$busca = $tecnologiaService->autoComplete($tecnologia);

		echo $busca;		
	}
	
	public function cadastrar()
	{	
		$tecnologia = new Tecnologia();

		if(Sessao::existeFormulario()) {             
			$tecnologia->setTecnologia(Sessao::retornaValorFormulario('tecnologia'));
			Sessao::limpaFormulario();
		}

		$this->setViewParam('tecnologia',$tecnologia); 
		$this->render('/tecnologia/cadastro');	

		Sessao::limpaErro();
	}

	public function salvar()
	{		
		$tecnologiaService = new TecnologiaService();

		$tecnologia = new Tecnologia();
		$tecnologia->setTecnologia(trim($_POST['tecnologia']));
		
		Sessao::gravaFormulario($_POST);		

		if($tecnologiaService->salvar($tecnologia)) { 			
			$this->redirect('/tecnologia/listar');
		} else {
			$this->redirect('/tecnologia/cadastrar');
		}			
	}

	public function edicao($params)
	{		
		$id = $params[0];

		if(ctype_digit($id)) {
			if(Sessao::existeFormulario()) {            
				$tecnologia = new Tecnologia();
				$tecnologia->setIdTecnologia(Sessao::retornaValorFormulario('idTecnologia'));
				$tecnologia->setTecnologia(Sessao::retornaValorFormulario('tecnologia'));	
				Sessao::limpaFormulario();
			} else {
				$tecnologiaService = new TecnologiaService();		
				$tecnologia = $tecnologiaService->listar($id)[0];	
			}			

			if(is_null($tecnologia)) {
				throw new \Exception("Página não encontrada.", 404);
			} else {
				$this->setViewParam('tecnologia',$tecnologia);
				$this->render('/tecnologia/editar');

				Sessao::limpaErro();
				Sessao::limpaFormulario();
			}			
		} else {
			throw new \Exception("Página não encontrada.", 404);
		}		
	}

	public function editar()
	{
		if(empty($_POST)) {
			throw new \Exception("Página não encontrada.", 404);
		} else {
			$novaTecnologia = new Tecnologia();
			$novaTecnologia->setIdTecnologia($_POST['idTecnologia']);
			$novaTecnologia->setTecnologia($_POST['tecnologia']);

			$tecnologiaService = new TecnologiaService();			

			Sessao::gravaFormulario($_POST);		

			if($tecnologiaService->editar($novaTecnologia, $tecnologiaCadastrada))
			{								
				$this->redirect('/tecnologia/listar');		
			} else {
				$this->redirect('/tecnologia/edicao/'. $novaTecnologia->getIdTecnologia());	
			}	
		}

	}
}