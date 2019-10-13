<?php
    
    namespace App\Models\Entidades;
    
    use DateTime;
    
    class Instituicao
    {
        private $inst_id;
        private $inst_nome;
        private $inst_codigo;
        private $inst_nomeFantasia;
        private $inst_dataCadastro;

        public function getInst_Id()
        {
            return $this->inst_id;
        }
    
        /**
         * @param mixed $id
         */
        public function setInst_Id($inst_id)
        {
            $this->inst_id = $inst_id;
        }        
        
        /**
         * @param mixed $id
         */
        public function setInst_Nome($inst_nome)
        {
            $this->inst_nome = $inst_nome;
        }
        
        public function getInst_Nome()
        {
            return $this->inst_codigo;
        }

        public function setInst_Codigo($inst_codigo)
        {
            $this->inst_codigo = $inst_codigo;
        }
        
        public function getInst_Codigo()
        {
            return $this->inst_codigo;
        }
        
        public function setInst_NomeFantasia($inst_nomeFantasia)
        {
            $this->inst_nomeFantasia = $inst_nomeFantasia;
        }
        
        public function getInst_NomeFantasia()
        {
            return $this->inst_nomeFantasia;
        }
        
        public function setInst_DataCadastro($inst_dataCadastro)
        {
            $this->inst_dataCadastro = $inst_dataCadastro;
        }
        
        public function getInst_DataCadastro()
        {
            return $this->inst_dataCadastro;
        }
    }