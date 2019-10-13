<?php 

namespace App\Models\Entidades;


class contatoCliente{

    private $codContato;
    private $telefone;
    private $celular;
    private $email;
    private $codCliente;

    /**
     * Get the value of codContato
     */ 
    public function getCodContato()
    {
        return $this->codContato;
    }

    /**
     * Set the value of codContato
     *
     * @return  self
     */ 
    public function setCodContato($codContato)
    {
        $this->codContato = $codContato;

        return $this;
    }

    /**
     * Get the value of telefone
     */ 
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     *
     * @return  self
     */ 
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of celular
     */ 
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set the value of celular
     *
     * @return  self
     */ 
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

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
}



?>