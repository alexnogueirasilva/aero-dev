<?php
    
    
    namespace App\Models\Entidades;
    
    use DateTime;
    
    
    class PedidoFalta
    {
        private $faltaCliente_cod;
        private $proposta;
        private $AFM;
        private $observacao;
        private $dataFalta;
        private $fk_produto;
        private $fk_cliente;
        private $fk_marca;
        private $fk_status;
   
        /**
         * @return mixed
         */
        public function getFaltaClienteCod()
        {
            return $this->faltaCliente_cod;
        }
    
        /**
         * @param mixed $faltaCliente_cod
         */
        public function setFaltaClienteCod($faltaCliente_cod): void
        {
            $this->faltaCliente_cod = $faltaCliente_cod;
        }
    
        /**
         * @return mixed
         */
        public function getProposta()
        {
            return $this->proposta;
        }
    
        /**
         * @param mixed $proposta
         */
        public function setProposta($proposta): void
        {
            $this->proposta = $proposta;
        }
    
        /**
         * @return mixed
         */
        public function getAFM()
        {
            return $this->AFM;
        }
    
        /**
         * @param mixed $AFM
         */
        public function setAFM($AFM): void
        {
            $this->AFM = $AFM;
        }
    
        /**
         * @return mixed
         */
        public function getObservacao()
        {
            return $this->observacao;
        }
    
        /**
         * @param mixed $observacao
         */
        public function setObservacao($observacao): void
        {
            $this->observacao = $observacao;
        }
    
        /**
         * @return mixed
         * @throws \Exception
         */
        public function getDataFalta()
        {
            return new DateTime($this->dataFalta);
        }
    
        /**
         * @param mixed $dataFalta
         */
        public function setDataFalta($dataFalta): void
        {
            $this->dataFalta = $dataFalta;
        }
    
        /**
         * @return mixed
         */
        public function getFkCliente() : Cliente
        {
            return $this->fk_cliente;
        }
    
        /**
         * @param mixed $fk_cliente
         */
        public function setFkCliente($fk_cliente): void
        {
            $this->fk_cliente = $fk_cliente;
        }
    
    
        /**
         * @return mixed
         */
        public function getFkProduto() : array
        {
            return $this->fk_produto;
        }
    
        /**
         * @param mixed $fk_produto
         */
        public function setFkProduto( array $fk_produto): void
        {
            $this->fk_produto = $fk_produto;
        }
    
        /**
         * @return mixed
         */
        public function getFkMarca() :array
        {
            return $this->fk_marca;
        }
    
        /**
         * @param mixed $fk_marca
         */
        public function setFkMarca( array $fk_marca): void
        {
            $this->fk_marca = $fk_marca;
        }
    
        /**
         * @return mixed
         */
        public function getFkStatus()
        {
            return $this->fk_status;
        }
    
        /**
         * @param mixed $fk_status
         */
        public function setFkStatus($fk_status): void
        {
            $this->fk_status = $fk_status;
        }

        
        
    }