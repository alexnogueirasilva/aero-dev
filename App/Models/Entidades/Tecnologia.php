<?php

namespace App\Models\Entidades;

class Tecnologia
{
	private $idtecnologia;
	private $tecnologia;

	public function getIdTecnologia()
	{
		return $this->idtecnologia;
	}

	public function setIdTecnologia($idTecnologia)
	{
		$this->idtecnologia = $idTecnologia;
	}

	public function getTecnologia()
	{
		return $this->tecnologia;
	}

	public function setTecnologia($tecnologia)
	{
		$this->tecnologia = $tecnologia;
	}
}

?>