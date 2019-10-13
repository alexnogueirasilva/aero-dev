<?php
    
    
    namespace App\Models\Entidades;
    
    
    class Grafico
    {
        private  $id;
        private  $nome;
        private  $marca;
        private  $fornecedor;
    
        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }
    
        /**
         * @param mixed $id
         */
        public function setId($id): void
        {
            $this->id = $id;
        }
    
        /**
         * @return mixed
         */
        public function getNome()
        {
            return $this->nome;
        }
    
        /**
         * @param mixed $nome
         */
        public function setNome($nome): void
        {
            $this->nome = $nome;
        }
    
        /**
         * @return mixed
         */
        public function getMarca()
        {
            return $this->marca;
        }
    
        /**
         * @param mixed $marca
         */
        public function setMarca($marca): void
        {
            $this->marca = $marca;
        }
    
        /**
         * @return mixed
         */
        public function getFornecedor()
        {
            return $this->fornecedor;
        }
    
        /**
         * @param mixed $fornecedor
         */
        public function setFornecedor($fornecedor): void
        {
            $this->fornecedor = $fornecedor;
        }
    }