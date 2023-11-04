<?php

    class LoginContr extends Login{
        private $nutilizator;
        private $email;
        private $passwd;
        
        public function __construct($nutilizator, $email, $passwd){
            $this->nutilizator = $nutilizator;
            $this->email = $email;
            $this->passwd = $passwd;
        }
        
        public function loginUser(){
            if(!$this->emptyInput()){
                header("location: index-event.php?error=emptyinput");
                exit();
            }
            $this->getUser($this->nutilizator, $this->email, $this->passwd);
        }
        private function emptyInput() {
            $result = true;
            
            if (empty($this->nutilizator) || empty($this->email) || empty($this->passwd)) {
                $result = false;
            }
            
            return $result;
        }
    }