<?php 

    namespace App\Models\Entidades;

    class Status{
        
        private $codStatus;
        private $fk_instituicao;
        private $nome;
        private $dataCadastro;


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

        /**
         * Get the value of nome
         */ 
        public function getNome()
        {
                return $this->nome;
        }

        /**
         * Set the value of nome
         *
         * @return  self
         */ 
        public function setNome($nome)
        {
                $this->nome = $nome;

                return $this;
        }

        /**
         * Get the value of dataCadastro
         */ 
        public function getDataCadastro()
        {
                return $this->dataCadastro;
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
}

?>