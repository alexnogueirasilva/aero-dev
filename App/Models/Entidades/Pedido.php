<?php 

namespace App\Models\Entidades;

use DateTime;

class Pedido{

    private $codControle;
    private $dataCadastro;
    private $numeroLicitacao;
    private $numeroAF;
    private $valorPedido;
    private $codStatus;
    private $codCliente;
    private $anexo;
    private $observacao;
    private $codRepresentante;
    private $fk_instituicao;
    private $dataFechamento;
    private $dataAlteracao;
    private $somaPedido;
    private $status;
    private $cliente;
    private $representante;
    private $instituicao;

    public function __construct(){
        $this->cliente = new Cliente();
        $this->status = new Status();        
        $this->representante = new Representante();
        $this->instituicao = new Instituicao();
    }
   

    /**
     * @return mixed
     */
    public function getInstituicao()
    {
        return $this->instituicao;
    }
    /**
     * @return mixed
     */
    public function getCodControle()
    {
        return $this->codControle;
    }

    /**
     * @param mixed $codControle
     */
    public function setCodControle($codControle)
    {
        $this->codControle = $codControle;
    }

    /**
     * @return mixed
     */
    public function getNumeroLicitacao()
    {
        return $this->numeroLicitacao;
    }

    /**
     * @param mixed $numeroLicitacao
     */
    public function setNumeroLicitacao($numeroLicitacao)
    {
        $this->numeroLicitacao = $numeroLicitacao;
    }

    /**
     * @return mixed
     */
    public function getNumeroAF()
    {
        return $this->numeroAF;
    }

    /**
     * @param mixed $numeroAF
     */
    public function setNumeroAF($numeroAF)
    {
        $this->numeroAF = $numeroAF;
    }

    /**
     * @return mixed
     */
    public function getValorPedido()
    {
        return $this->valorPedido;
    }

    /**
     * @param mixed $valorPedido
     */
    public function setValorPedido($valorPedido)
    {
        $this->valorPedido = $valorPedido;
    }
    /**
     * @param mixed $valorPedido
     */
    public function setSomaPedido($somaPedido)
    {
        $this->somaPedido = $somaPedido;
    }
    public function getSomaPedido()
    {
        return $this->somaPedido;
    }

    /**
     * @return mixed
     */
    public function getAnexo()
    {
        return $this->anexo;
    }

    /**
     * @param mixed $anexo
     */
    public function setAnexo($anexo)
    {
        $this->anexo = $anexo;
    }

    /**
     * @return mixed
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
     * Get the value of dataAlteracao
     */ 
    public function getDataAlteracao()
    {
        return $this->dataAlteracao;
    }

    /**
     * Set the value of dataAlteracao
     *
     * @return  self
     */ 
    public function setDataAlteracao($dataAlteracao)
    {
        $this->dataAlteracao = $dataAlteracao;

        return $this;
    }

    /**
     * Get the value of dataFechamento
     */ 
    public function getDataFechamento()
    {
        return $this->dataFechamento;
    }

    /**
     * Set the value of dataFechamento
     *
     * @return  self
     */ 
    public function setDataFechamento($dataFechamento)
    {
        $this->dataFechamento = $dataFechamento;

        return $this;
    }

    /**
     * Get the value of codStatus
     */ 
    public function getCodStatus()
    {
        return $this->codStatus;
    }

    /**
     * Set the value of codStatus
     *
     * @return  self
     */ 
    public function setCodStatus($codStatus)
    {
        $this->codStatus = $codStatus;

        return $this;
    }

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
     * Get the value of cliente
     */ 
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Get the value of representante
     */ 
    public function getRepresentante()
    {
        return $this->representante;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
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
     * Get the value of observacao
     */ 
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * Set the value of observacao
     *
     * @return  self
     */ 
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }

    /**
     * Get the value of fk_instituicao
     */ 
    public function getFk_instituicao()
    {
        return $this->fk_instituicao;
    }

    /**
     * Set the value of fk_instituicao
     *
     * @return  self
     */ 
    public function setFk_instituicao($fk_instituicao)
    {
        $this->fk_instituicao = $fk_instituicao;

        return $this;
    }
}