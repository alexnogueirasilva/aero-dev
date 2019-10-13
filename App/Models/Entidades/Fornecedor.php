<?php
    
    
    namespace App\Models\Entidades;
    
    use DateTime;
    
    class Fornecedor
    {
        private $fornecedor_cod;
        private $forRazaoSocial;
        private $forNomeFantasia;
        private $forCnpj;
        private $forDataCadastro;
    
        /**
         * @return mixed
         */
        public function getFornecedor_Cod()
        {
            return $this->fornecedor_cod;
        }
    
        /**
         * @param mixed $fornecedor_cod
         */
        public function setFornecedor_Cod($fornecedor_cod)
        {
            $this->fornecedor_cod = $fornecedor_cod;
        }
    
        /**
         * @return mixed
         */
        public function getForRazaoSocial()
        {
            return $this->forRazaoSocial;
        }
    
        /**
         * @param mixed $forRazaoSocial
         */
        public function setForRazaoSocial($forRazaoSocial)
        {
            $this->forRazaoSocial = $forRazaoSocial;
        }
    
        /**
         * @return mixed
         */
        public function getForNomeFantasia()
        {
            return $this->forNomeFantasia;
        }
    
        /**
         * @param mixed $forNomeFantasia
         */
        public function setForNomeFantasia($forNomeFantasia)
        {
            $this->forNomeFantasia = $forNomeFantasia;
        }
    
        /**
         * @return mixed
         */
        public function getForCnpj()
        {
            return $this->forCnpj;
        }
    
        /**
         * @param mixed $forCnpj
         */
        public function setForCnpj($forCnpj)
        {
            $this->forCnpj = $forCnpj;
        }
    
        /**
         * @return mixed
         * @throws \Exception
         */
        public function getForDataCadastro()
        {
            return new DateTime($this->forDataCadastro);
        }
    
        /**
         * @param mixed $forDataCadastro
         */
        public function setForDataCadastro($forDataCadastro)
        {
            $this->forDataCadastro = $forDataCadastro;
        }
        
    }