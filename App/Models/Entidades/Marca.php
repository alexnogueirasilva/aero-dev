<?php
    
    
    namespace App\Models\Entidades;
    
    use DateTime;
    
    class Marca
    {
        private $marcaCod;
        private $marcaNome;        
        private $dataCadastro;
        
        /**
         * @return mixed
         */
        public function getMarcaCod()
        {
            return $this->marcaCod;
        }
    
        /**
         * @param mixed $marcaCod
         */
        public function setMarcaCod($marcaCod)
        {
            $this->marcaCod = $marcaCod;
        }
    
        /**
         * @return mixed
         */
        public function getMarcaNome()
        {
            return $this->marcaNome;
        }
    
        /**
         * @param mixed $marcaNome
         */
        public function setMarcaNome($marcaNome)
        {
            $this->marcaNome = $marcaNome;
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