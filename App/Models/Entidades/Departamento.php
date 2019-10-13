<?php
    
    namespace App\Models\Entidades;
    
    use DateTime;
    
    class Departamento
    {
        private $id;
        private $nome;
        private $dataCadastro;
        private $instituicao;
        private $fk_idInstituicao;


        public function __construct()
        {
            $this->instituicao = new Instituicao();
        }
    
        public function getInstituicao()
        {
            return $this->instituicao;
        }
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
        public function getFk_IdInstituicao()
        {
            return $this->fk_idInstituicao;
        }
    
        /**
         * @param mixed $id
         */
        public function setFk_IdInstituicao($fk_idInstituicao)
        {
            $this->fk_idInstituicao = $fk_idInstituicao;
        }
    
        
        /**
         * @return mixed
         */
        public function getNome()
        {
            return $this->nomeFantasia;
        }
    
        /**
         * @param mixed $nome
         */
        public function setNome($nome)
        {
            $this->nomeFantasia = $nome;
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