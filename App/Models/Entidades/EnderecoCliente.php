<?php 

namespace App\Models\Entidades;

class enderecoCliente{


    private $codEndereco;
    private $logradouro;
    private $numero;
    private $cep;
    private $cidade;
    private $estado;
    private $enderecoCliente;



    public function __construct()
    {
        $this->enderecoCliente = new EnderecoCliente();
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

    /**
     * Get the value of logradouro
     */ 
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * Set the value of logradouro
     *
     * @return  self
     */ 
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    /**
     * Get the value of numero
     */ 
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */ 
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of cep
     */ 
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set the value of cep
     *
     * @return  self
     */ 
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get the value of cidade
     */ 
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set the value of cidade
     *
     * @return  self
     */ 
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }


    /**
     * Get the value of enderecoCliente
     */ 
    public function getEnderecoCliente()
    {
        return $this->enderecoCliente;
    }
}



?>