<?php 

namespace App\Models\Entidades;

use DateTime;

class orcamento{

    private $dataCriacao;
    private $dataValidade;
    private $etapa;
    private $codCliente;
    private $codEndereco;




    /**
     * Get the value of dataCriacao
     */ 
    public function getDataCriacao()
    {
        return new DateTime($this->dataCriacao);
    }

    /**
     * Set the value of dataCriacao
     *
     * @return  self
     */ 
    public function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;

        return $this;
    }

    /**
     * Get the value of dataValidade
     */ 
    public function getDataValidade()
    {
        return new DateTime($this->dataValidade);
    }

    /**
     * Set the value of dataValidade
     *
     * @return  self
     */ 
    public function setDataValidade($dataValidade)
    {
        $this->dataValidade = $dataValidade;

        return $this;
    }

    /**
     * Get the value of etapa
     */ 
    public function getEtapa()
    {
        return $this->etapa;
    }

    /**
     * Set the value of etapa
     *
     * @return  self
     */ 
    public function setEtapa($etapa)
    {
        $this->etapa = $etapa;

        return $this;
    }

    /**
     * Get the value of codCliente
     */ 
    public function getCodCliente()
    {
        return $this->codCliente;
    }

    /**
     * Set the value of codCliente
     *
     * @return  self
     */ 
    public function setCodCliente($codCliente)
    {
        $this->codCliente = $codCliente;

        return $this;
    }

    /**
     * Get the value of codEndereco
     */ 
    public function getCodEndereco()
    {
        return $this->codEndereco;
    }

    /**
     * Set the value of codEndereco
     *
     * @return  self
     */ 
    public function setCodEndereco($codEndereco)
    {
        $this->codEndereco = $codEndereco;

        return $this;
    }
}



?>