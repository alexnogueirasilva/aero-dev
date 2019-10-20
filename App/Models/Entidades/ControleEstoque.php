<?php

namespace App\Models\Entidade;

class ControleEsoque
{
    private $item;
    private $estoque;
    private $lote;
    private $validade;
    private $dataCadastro;


    public function getItem()
    {
        return $this->item;
    }

    public function setItem($item)
    {
        $this->item = $item;
    }

    public function getEstoque()
    {
        return $this->estoque;
    }

    public function setEstoque($estoque)
    {
        $this->estoque = $estoque;
    }
}




?>