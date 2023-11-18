<?php
    
    class Administrator
    {
        private $administratorId;
        private $numeUtilizator;
        private $nume;
        private $prenume;
        private $email;
        private $password;
        
        /**
         * @return mixed
         */
        public function getAdministratorId()
        {
            return $this->administratorId;
        }
        
        /**
         * @param mixed $administratorId
         */
        public function setAdministratorId($administratorId)
        {
            $this->administratorId = $administratorId;
        }
        
        /**
         * @return mixed
         */
        public function getNumeUtilizator()
        {
            return $this->numeUtilizator;
        }
        
        /**
         * @param mixed $numeUtilizator
         */
        public function setNumeUtilizator($numeUtilizator)
        {
            $this->numeUtilizator = $numeUtilizator;
        }
        
        /**
         * @return mixed
         */
        public function getNume()
        {
            return $this->nume;
        }
        
        /**
         * @param mixed $nume
         */
        public function setNume($nume)
        {
            $this->nume = $nume;
        }
        
        /**
         * @return mixed
         */
        public function getPrenume()
        {
            return $this->prenume;
        }
        
        /**
         * @param mixed $prenume
         */
        public function setPrenume($prenume)
        {
            $this->prenume = $prenume;
        }
        
        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }
        
        /**
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
        }
        
        /**
         * @return mixed
         */
        public function getPassword()
        {
            return $this->password;
        }
        
        /**
         * @param mixed $password
         */
        public function setPassword($password)
        {
            $this->password = $password;
        }
        
    }