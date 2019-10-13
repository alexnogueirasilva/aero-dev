<?php


namespace App\Models\Entidades;

use DateTime;

class ClienteLicitacao
{

    private $codCliente;
    private $razaoSocial;
    private $nomeFantasia;
    private $cnpj;
    private $trocaMarca;
    private $dataCadastro;
    private $tipoCliente;
    private $idTipoCliente;
    
    
    public  function  __construct()
    {
        $this->tipoCliente = new TipoCliente();
    }

    /**
     * @return TipoCliente
     */

    public function getTipoCliente()   {
        return $this->tipoCliente;
    }
    
    /**
     * @return mixed
     */
    public function getCodCliente()
    {
        return $this->codCliente;
    }

    /**
     * @param mixed $codCliente
     */
    public function setCodCliente($codCliente)
    {
        $this->codCliente = $codCliente;
    }
    
    public function  getTipoCliente_cod()
    {
        return $this->TipoCliente_cod();
    }
    
    public function setTipoCliente_cod($TipoCliente_cod)
    {
        $this->$TipoCliente_cod = $TipoCliente_cod;
    }


    public function  getIdTipoCliente()
    {
        return $this->IdTipoCliente();
    }
    
    public function setIdTipoCliente($IdTipoCliente)
    {
        $this->$IdTipoCliente = $IdTipoCliente;
    }
    /**
     * @return mixed
     */
    public function getTrocaMarca()
    {
        return $this->trocaMarca;
    }

    /**
     * @param mixed $trocaMarca
     */
    public function setTrocaMarca($trocaMarca)
    {
        $this->trocaMarca = $trocaMarca;
    }

    /**
     * @return mixed
     */
    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
    }

    /**
     * @param mixed $nomeFantasia
     */
    public function setNomeFantasia($nomeFantasia)
    {
        $this->nomeFantasia = $nomeFantasia;
    }

    /**
     * @return mixed DateTime
     * @throws \Exception
     */
    public function getDataCadastro()
    {
        return new DateTime($this->dataCadastro);
    }

    /**
     * @param mixed $dataCadastro
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
    }
    
    /**
     * Get the value of razaoSocial
     */ 
    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    /**
     * Set the value of razaoSocial
     *
     * @return  self
     */ 
    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;

        return $this;
    }

    /**
     * Get the value of cnpj
     */ 
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Set the value of cnpj
     *
     * @return  self
     */ 
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }
}