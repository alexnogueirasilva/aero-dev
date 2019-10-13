<?php 

    namespace App\Models\Entidades;

    use DateTime;

    class Cliente{

        private $codCliente;
        private $nomeCliente;
        private $nomeFantasiaCliente;
        private $status;
        private $tipoCliente;
        private $dataCadastroCliente;

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
        public function setCodCliente($codCliente)        {
                $this->codCliente = $codCliente;
                return $this;
        }

        public function getTipoCliente()
        {
                return $this->tipoCliente;
        }
        
        public function setTipoCliente($tipoCliente)
        {
                $this->tipoCliente = $tipoCliente;

                return $this;
        }
        /**
         * Get the value of nomeCliente
         */ 
        public function getNomeCliente()
        {
                return $this->nomeCliente;
        }

        /**
         * Set the value of nomeCliente
         *
         * @return  self
         */ 
        public function setNomeCliente($nomeCliente)
        {
                $this->nomeCliente = $nomeCliente;

                return $this;
        }

        /**
         * Get the value of sobreNomeCliente
         */ 
        public function getNomeFantasiaCliente()
        {
                return $this->nomeFantasiaCliente;
        }

        /**
         * Set the value of sobreNomeCliente
         *
         * @return  self
         */ 
        public function setNomeFantasiaCliente($nomeFantasiaCliente)
        {
                $this->nomeFantasiaCliente = $nomeFantasiaCliente;

                return $this;
        }

        /**
         * Get the value of cpf
         */ 
        public function getStatus()
        {
                return $this->status;
        }

        /**
         * Set the value of cpf
         *
         * @return  self
         */ 
        public function setStatus($status)
        {
                $this->status = $status;

                return $this;
        }

        /**
         * Get the value of dataCastroCliente
         */ 
        public function getDataCadastroCliente()
        {
                return new DateTime($this->dataCadastroCliente);
        }

        /**
         * Set the value of dataCastroCliente
         *
         * @return  self
         */ 
        public function setDataCadastroCliente($dataCadastroCliente)
        {
                $this->dataCastroCliente = $dataCadastroCliente;

                return $this;
        }
}