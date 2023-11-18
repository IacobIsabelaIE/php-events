<?php
    
    class Administrator
    {
        private $administratorId;
        private $userName;
        private $firstName;
        private $lastName;
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
        public function getUserName()
        {
            return $this->userName;
        }
        
        /**
         * @param mixed $userName
         */
        public function setUserName($userName)
        {
            $this->userName = $userName;
        }
        
        /**
         * @return mixed
         */
        public function getFirstName()
        {
            return $this->firstName;
        }
        
        /**
         * @param mixed $firstName
         */
        public function setFirstName($firstName)
        {
            $this->firstName = $firstName;
        }
        
        /**
         * @return mixed
         */
        public function getLastName()
        {
            return $this->lastName;
        }
        
        /**
         * @param mixed $lastName
         */
        public function setLastName($lastName)
        {
            $this->lastName = $lastName;
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