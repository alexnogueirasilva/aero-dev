<?php

namespace App\Models\Entidades;

use DataTime;

class Representante
{
    private $codRepresentante;
    private $nomeRepresentante;
    private $dataCadastro;
    private $statusRepresentante;

    /**
     * Get the value of codRepresentante
     */ 
    public function getCodRepresentante()
    {
        return $this->codRepresentante;
    }

    /**
     * Set the value of codRepresentante
     *
     * @return  self
     */ 
    public function setCodRepresentante($codRepresentante)
    {
        $this->codRepresentante = $codRepresentante;

        return $this;
    }

    /**
     * Get the value of nomeRepresentante
     */ 
    public function getNomeRepresentante()
    {
        return $this->nomeRepresentante;
    }

    /**
     * Set the value of nomeRepresentante
     *
     * @return  self
     */ 
    public function setNomeRepresentante($nomeRepresentante)
    {
        $this->nomeRepresentante = $nomeRepresentante;

        return $this;
    }

    /**
     * Get the value of dataCadastro
     */ 
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * Set the value of dataCadastro
     *
     * @return  self
     */ 
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;

        return $this;
    }

    /**
     * Get the value of statusRepresentante
     */ 
    public function getStatusRepresentante()
    {
        return new DateTime($this->dataCadastro);
    }

    /**
     * Set the value of statusRepresentante
     *
     * @return  self
     */ 
    public function setStatusRepresentante($statusRepresentante)
    {
        $this->statusRepresentante = $statusRepresentante;

        return $this;
    }
}

?>