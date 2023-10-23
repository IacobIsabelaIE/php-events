<?php
    
    class SignupContr extends Signup
    {
        private $nutilizator;
        private $nume;
        private $prenume;
        private $email;
        private $passwd;
        
        public function __construct($nutilizator, $nume, $prenume, $email, $passwd)
        {
            $this->nutilizator = $nutilizator;
            $this->nume = $nume;
            $this->prenume = $prenume;
            $this->email = $email;
            $this->passwd = $passwd;
        }
        
        public function signupUser()
        {
            if (!$this->emptyInput()) {
                header("location: index.php?error=emptyinput");
                exit();
            }
            
            if (!$this->invalidNutilizator()) {
                header("location: index.php?error=username");
                exit();
            }
            
            if (!$this->invalidEmail()) {
                header("location: index.php?error=email");
                exit();
            }
            
            if (!$this->doesUserExist($this->nutilizator, $this->email)) {
                header("location: index.php?error=useroremailtaken");
                exit();
            }
            
            $this->setUser($this->nutilizator, $this->nume, $this->prenume, $this->email, $this->passwd);
            header("location: Pagina.php?error=none");
            exit();
        }
        
        private function emptyInput()
        {
            $result = true;
            
            if (empty($this->nutilizator) || empty($this->nume) || empty($this->prenume) || empty($this->email) || empty($this->passwd)) {
                $result = false;
            }
            
            return $result;
        }
        
        private function invalidNutilizator()
        {
            $result = true;
            
            if (!preg_match("/^[a-zA-Z0-9]*$/", $this->nutilizator)) {
                $result = false;
            }
            
            return $result;
        }
        
        private function invalidEmail()
        {
            $result = true; // Asumam ca emailul este valid
            
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $result = false;
            }
            
            return $result;
        }
        
    }

?>