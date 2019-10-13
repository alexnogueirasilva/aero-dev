<?php


namespace App\Models\Entidades;

use DateTime;

class TipoCliente
{
    private $codTipoCliente;
    private $nomeTipo;
    private $dataCadastro;

    /**
     * @return mixed
     */
    public function getCodTipoCliente()
    {
        return $this->codTipoCliente;
    }

    /**
     * @param mixed $codTipoCliente
     */
    public function setCodTipoCliente($codTipoCliente)
    {
        $this->codTipoCliente = $codTipoCliente;
    }

    /**
     * @return mixed
     */
    public function getNomeTipo()
    {
        return $this->nomeTipo;
    }

    /**
     * @param mixed $nomeTipo
     */
    public function setNomeTipo($nomeTipo)
    {
        $this->nomeTipo = $nomeTipo;
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


}