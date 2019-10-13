<?php
    
    
    namespace App\Models\Entidades;
    
    use DateTime;
    
    class Sla
    {
        private $id;
        private $descricao;
        private $tempo;
        private $uniTempo;
        private $fk_instituicao;
        private $dataCadastro;
        
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
        public function setId($id)
        {
            $this->id = $id;
        }
    
        /**
         * @return mixed
         */
        public function getDescricao()
        {
            return $this->descricao;
        }
    
        /**
         * @param mixed $descricao
         */
        public function setDescricao($descricao)
        {
            $this->descricao = $descricao;
        }
    
        /**
         * @return mixed
         */
        public function getTempo()
        {
            return $this->tempo;
        }
    
        /**
         * @param mixed $tempo
         */
        public function setTempo($tempo)
        {
            $this->tempo = $tempo;
        }
    
        /**
         * @return mixed
         */
        public function getUniTempo()
        {
            return $this->uniTempo;
        }
    
        /**
         * @param mixed $uniTempo
         */
        public function setUniTempo($uniTempo)
        {
            $this->uniTempo = $uniTempo;
        }
        /**
         * @return mixed
         */
        public function getFk_Instituicao()
        {
            return $this->fk_instituicao;
        }
    
        /**
         * @param mixed $fk_instituicao
         */
        public function setFk_Instituicao($fk_instituicao)
        {
            $this->fk_instituicao = $fk_instituicao;
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