<?php

namespace App\Models\Entidades;

class Vaga { 

	private $idvaga;
	private $titulo;
	private $tecnologias;
	private $descricao;
	private $empresa; 

	public function getEmpresa() : Empresa {
		return $this->empresa;
	}

	public function setEmpresa(Empresa $empresa) {
		$this->empresa = $empresa;
	}

	public function getIdVaga(){
		return $this->idvaga;
	}

	public function setIdVaga($idVaga){
		$this->idvaga = $idVaga;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getTecnologias() : array {
		return $this->tecnologias;
	}

	public function setTecnologias(array $tecnologias){
		$this->tecnologias = $tecnologias;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}
}

?>
