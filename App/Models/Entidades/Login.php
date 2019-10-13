<?php 

namespace App\Models\Entidades;

use DateTime;


class Login 
{

    private $codUsuario;
    private $nomeLogin;
    private $emailLogin;
    private $passoword;
    private $dataCadastro;
    private $fk_instituicao;
    

    /**
     * Get the value of codUsuario
     */ 
    public function getCodUsuario()
    {
        return $this->codUsuario;
    }

    /**
     * Set the value of codUsuario
     *
     * @return  self
     */ 
    public function setCodUsuario($codUsuario)
    {
        $this->codUsuario = $codUsuario;

        return $this;
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
     * Get the value of nomeLogin
     */ 
    public function getNomeLogin()
    {
        return $this->nomeLogin;
    }

    /**
     * Set the value of nomeLogin
     *
     * @return  self
     */ 
    public function setNomeLogin($nomeLogin)
    {
        $this->nomeLogin = $nomeLogin;

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
     * Get the value of emailLogin
     */ 
    public function getEmailLogin()
    {
        return $this->emailLogin;
    }

    /**
     * Set the value of emailLogin
     *
     * @return  self
     */ 
    public function setEmailLogin($emailLogin)
    {
        $this->emailLogin = $emailLogin;

        return $this;
    }

    /**
     * Get the value of passoword
     */ 
    public function getPassoword()
    {
        return $this->passoword;
    }

    /**
     * Set the value of passoword
     *
     * @return  self
     */ 
    public function setPassoword($passoword)
    {
        $this->passoword = $passoword;

        return $this;
    }
}

?>