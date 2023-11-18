<?php
    
    class Event
    {
        private $eventId;
        
        private $eventTitle;
        private $eventDescription;
        private $dateTime;
        private $location;
        private $partner;
        private $sponsor;
        private $eventPrice;
        
        /**
         * @return mixed
         */
        public function getEventPrice()
        {
            return $this->eventPrice;
        }
        
        /**
         * @param mixed $eventPrice
         */
        public function setEventPrice($eventPrice)
        {
            $this->eventPrice = $eventPrice;
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
        public function getEventTitle()
        {
            return $this->eventTitle;
        }
        
        /**
         * @param mixed $eventTitle
         */
        public function setEventTitle($eventTitle)
        {
            $this->eventTitle = $eventTitle;
        }
        
        /**
         * @return mixed
         */
        public function getEventDescription()
        {
            return $this->eventDescription;
        }
        
        /**
         * @param mixed $eventDescription
         */
        public function setEventDescription($eventDescription)
        {
            $this->eventDescription = $eventDescription;
        }
        
        /**
         * @return mixed
         */
        public function getDateTime()
        {
            return $this->dateTime;
        }
        
        /**
         * @param mixed $dateTime
         */
        public function setDateTime($dateTime)
        {
            $this->dateTime = $dateTime;
        }
        
        /**
         * @return mixed
         */
        public function getLocation()
        {
            return $this->location;
        }
        
        /**
         * @param mixed $location
         */
        public function setLocation($location)
        {
            $this->location = $location;
        }
        
        /**
         * @return mixed
         */
        public function getPartner()
        {
            return $this->partner;
        }
        
        /**
         * @param mixed $partner
         */
        public function setPartner($partner)
        {
            $this->partner = $partner;
        }
        
        /**
         * @return mixed
         */
        public function getSponsor()
        {
            return $this->sponsor;
        }
        
        /**
         * @param mixed $sponsor
         */
        public function setSponsor($sponsor)
        {
            $this->sponsor = $sponsor;
        }
        
    }