<?php
    
    class Ticket
    {
        private $ticketId;
        private $eventId;
        private $firstName;
        private $lastName;
        private $email;
        private $acquisitionDate;
        private $eventDate;
        private $ticketPrice;
        private $referenceId;
        
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
        public function getAcquisitionDate()
        {
            return $this->acquisitionDate;
        }
        
        /**
         * @param mixed $acquisitionDate
         */
        public function setAcquisitionDate($acquisitionDate)
        {
            $this->acquisitionDate = $acquisitionDate;
        }
        
        /**
         * @return mixed
         */
        public function getEventDate()
        {
            return $this->eventDate;
        }
        
        /**
         * @param mixed $eventDate
         */
        public function setEventDate($eventDate)
        {
            $this->eventDate = $eventDate;
        }
        
        /**
         * @return mixed
         */
        public function getReferenceId()
        {
            return $this->referenceId;
        }
        
        /**
         * @param mixed $referenceId
         */
        public function setReferenceId($referenceId)
        {
            $this->referenceId = $referenceId;
        }
        
        /**
         * @return mixed
         */
        public function getTicketPrice()
        {
            return $this->ticketPrice;
        }
        
        /**
         * @param mixed $ticketPrice
         */
        public function setTicketPrice($ticketPrice)
        {
            $this->ticketPrice = $ticketPrice;
        }
        
    }