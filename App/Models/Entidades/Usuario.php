<?php

namespace App\Models\Entidades;
use DateTime;
class Usuario
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $nivel;
    private $id_dep;
    private $status;
    private $fk_instituicao;
    private $dataCadastro;
    private $valida;
    private $dica;
    private $departamento;
    
    public function __construct()
    {
        $this->departamento = new Departamento();
    }
    
    /**
     * Get the value of departamento
     */ 
    public function getDepartamento()
    {
        return $this->departamento;
    }
    /**
     * Get the value of fk_instituicao
     */ 
    public function getFk_Instituicao()
    {
        return $this->fk_instituicao;
    }

    /**
     * Set the value of fk_instituicao
     *
     * @return  self
     */ 
    public function setFk_Instituicao($fk_instituicao)
    {
        $this->fk_instituicao = $fk_instituicao;

        return $this;
    }

/**
     * Get the value of dataCadastro
     */ 
    public function getDataCadastro()
    {
        return new DateTime($this->dataCadastro);
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
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }
    
    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get the value of nivel
     */ 
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set the value of nivel
     *
     * @return  self
     */ 
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get the value of id_dep
     */ 
    public function getId_dep()
    {
        return $this->id_dep;
    }

    /**
     * Set the value of id_dep
     *
     * @return  self
     */ 
    public function setId_dep($id_dep)
    {
        $this->id_dep = $id_dep;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of valida
     */ 
    public function getValida()
    {
        return $this->valida;
    }

    /**
     * Set the value of valida
     *
     * @return  self
     */ 
    public function setValida($valida)
    {
        $this->valida = $valida;

        return $this;
    }

    /**
     * Get the value of dica
     */ 
    public function getDica()
    {
        return $this->dica;
    }

    /**
     * Set the value of dica
     *
     * @return  self
     */ 
    public function setDica($dica)
    {
        $this->dica = $dica;

        return $this;
    }

    
}