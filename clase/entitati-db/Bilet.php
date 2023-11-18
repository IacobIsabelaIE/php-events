<?php
    
    class Bilet
    {
        private $ticketId;
        private $eventId;
        private $nume;
        private $prenume;
        private $email;
        private $dataAchizitie;
        private $dataEveniment;
        private $pretBilet;
        private $referintaId;
        
        /**
         * @return mixed
         */
        public function getTicketId()
        {
            return $this->ticketId;
        }
        
        /**
         * @param mixed $ticketId
         */
        public function setTicketId($ticketId)
        {
            $this->ticketId = $ticketId;
        }
        
        /**
         * @return mixed
         */
        public function getEventId()
        {
            return $this->eventId;
        }
        
        /**
         * @param mixed $eventId
         */
        public function setEventId($eventId)
        {
            $this->eventId = $eventId;
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
        public function getDataAchizitie()
        {
            return $this->dataAchizitie;
        }
        
        /**
         * @param mixed $dataAchizitie
         */
        public function setDataAchizitie($dataAchizitie)
        {
            $this->dataAchizitie = $dataAchizitie;
        }
        
        /**
         * @return mixed
         */
        public function getDataEveniment()
        {
            return $this->dataEveniment;
        }
        
        /**
         * @param mixed $dataEveniment
         */
        public function setDataEveniment($dataEveniment)
        {
            $this->dataEveniment = $dataEveniment;
        }
        
        /**
         * @return mixed
         */
        public function getReferintaId()
        {
            return $this->referintaId;
        }
        
        /**
         * @param mixed $referintaId
         */
        public function setReferintaId($referintaId)
        {
            $this->referintaId = $referintaId;
        }
        
        /**
         * @return mixed
         */
        public function getPretBilet()
        {
            return $this->pretBilet;
        }
        
        /**
         * @param mixed $pretBilet
         */
        public function setPretBilet($pretBilet)
        {
            $this->pretBilet = $pretBilet;
        }
        
    }