<?php
 namespace App\Models\Entidades;

 use DateTime;

 class Cidade{
/*
cidid,cidnome,ciddatacadastro,ciddataalteracao,cidusuario,cidestado
*/
    private $cidId;
    private $cidNome;
    private $cidDataCadastro;
    private $cidDataAlteracao;
    private $usuario;
    private $estado;

        /**
         * Get the value of codCliente
         */ 
        public function getCidId()
        {
                return $this->cidId;
        }

        /**
         * Set the value of cidId
         *
         * @return  self
         */ 
        public function setCidId($cidId)        {
                $this->cidId = $cidId;
                return $this;
        }

        /**
         * Get the value of codCliente
         */ 
        public function getCidNome()
        {
                return $this->cidNome;
        }

        /**
         * Set the value of cidNome
         *
         * @return  self
         */ 
        public function setCidNome($cidNome)        {
                $this->cidNome = $cidNome;
                return $this;
        }

    public function getCidDataAlteracao()
        {
                return new DateTime($this->cidDataAlteracao);
        }

        /**
         * Set the value of cidDataAlteracao
         *
         * @return  self
         */ 
        public function setCidDataAlteracao($cidDataAlteracao)
        {
                $this->cidDataAlteracao = $cidDataAlteracao;

                return $this;
        }
    public function getCidDataCadastro()
        {
                return new DateTime($this->cidDataCadastro);
        }

        /**
         * Set the value of cidDataCadastro
         *
         * @return  self
         */ 
        public function setCidDataCadastro($cidDataCadastro)
        {
                $this->cidDataCadastro = $cidDataCadastro;

                return $this;
        }

        public function getEstado() {
            return $this->estado;
        }
    
        public function setEstado(Estado $estado) {
            $this->estado = $estado;
        }
    
    public function getUsuario() {
        return $this->usuario;
    }
    
    public function setUsuario(Usuario $usuario) {
        $this->usuario = $usuario;
    }
 }

?>