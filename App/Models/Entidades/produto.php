<?php

namespace App\Models\Entidades;

use DateTime;

class Produto
{
    private $proCodigo;
    private $proNome;
    private $proNomeComercial;
    private $proDataCadastro;
    private $proDataAlteracao;
    
    private $proUsuario;
    private $proFornecedor;
    private $proMarca;
    private $marca;
    private $fornecedor;
    private $usuario;
    /*
ProCodigo - ProNome - ProNomeComercial - ProUsuario - ProMarca - ProFornecedor - ProDataCadastro - ProDataAlteracao
    */
    public function __construct(){
        $this->marca = new Marca();       
        $this->fornecedor = new Fornecedor();
        $this->usuario = new Usuario();
    }
    public function getMarca()
    {
        return $this->marca;
    }
    public function getFornecedor()
    {
        return $this->fornecedor;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getProCodigo()
    {
        return $this->proCodigo;
    }

    public function setProCodigo($proCodigo)
    {
        $this->proCodigo = $proCodigo;
    }

    public function getProNome()
    {
        return $this->proNome;
    }

    public function setProNome($proNome)
    {
        $this->proNome = $proNome;
    }
    
    public function getProNomeComercial()
    {
        return $this->proNomeComercial;
    }

    public function setProNomeComercial($proNomeComercial)
    {
        $this->proNomeComercial = $proNomeComercial;
    }
    
    public function getProDataCadastro()
    {
        return new DateTime($this->proDataCadastro);
    }

    public function setProDataCadastro($proDataCadastro)
    {
        $this->proDataCadastro = $proDataCadastro;
    }

    public function getProDataAlteracao()
    {
        return new DateTime($this->proDataAlteracao);
    }

    public function setProDataAlteracao($proDataAlteracao)
    {
        $this->proDataAlteracao = $proDataAlteracao;
    }

    /**
     * Get the value of proUsuario
     */ 
    public function getProUsuario()
    {
        return $this->proUsuario;
    }

    /**
     * Set the value of proUsuario
     *
     * @return  self
     */ 
    public function setProUsuario($proUsuario)
    {
        $this->proUsuario = $proUsuario;

        return $this;
    }

    /**
     * Get the value of proFornecedor
     */ 
    public function getProFornecedor()
    {
        return $this->proFornecedor;
    }

    /**
     * Set the value of proFornecedor
     *
     * @return  self
     */ 
    public function setProFornecedor($proFornecedor)
    {
        $this->proFornecedor = $proFornecedor;

        return $this;
    }

    /**
     * Get the value of proMarca
     */ 
    public function getProMarca()
    {
        return $this->proMarca;
    }

    /**
     * Set the value of proMarca
     *
     * @return  self
     */ 
    public function setProMarca($proMarca)
    {
        $this->proMarca = $proMarca;

        return $this;
    }
}