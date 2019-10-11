<?php

namespace App\Models\Entidades;

class Empresa
{
	private $idempresa;
	private $razaosocial;
	private $nomefantasia;
	private $CNPJ;

	public function getIdEmpresa()
	{
		return $this->idempresa;
	}

	public function setIdEmpresa($idEmpresa)
	{
		$this->idempresa = $idEmpresa;
	}

	public function getNomeFantasia()
	{
		return $this->nomefantasia;
	}

	public function setNomeFantasia($nomeFantasia)
	{
		$this->nomefantasia = $nomeFantasia;
	}

	public function getCNPJ()
	{
		return $this->CNPJ;
	}

	public function setCNPJ($CNPJ)
	{
		$this->CNPJ = $CNPJ;
	}

	public function getRazaoSocial()
	{
		return $this->razaosocial;
	}

	public function setRazaoSocial($razaoSocial)
	{
		$this->razaosocial = $razaoSocial;
	}

}

?>