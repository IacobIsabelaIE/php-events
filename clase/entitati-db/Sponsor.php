<?php
    
    class Sponsor
    {
        private $sponsorId;
        private $numeSponsor;
        private $descriereSponsor;
        
        /**
         * @return mixed
         */
        public function getSponsorId()
        {
            return $this->sponsorId;
        }
        
        /**
         * @param mixed $sponsorId
         */
        public function setSponsorId($sponsorId)
        {
            $this->sponsorId = $sponsorId;
        }
        
        /**
         * @return mixed
         */
        public function getNumeSponsor()
        {
            return $this->numeSponsor;
        }
        
        /**
         * @param mixed $numeSponsor
         */
        public function setNumeSponsor($numeSponsor)
        {
            $this->numeSponsor = $numeSponsor;
        }
        
        /**
         * @return mixed
         */
        public function getDescriereSponsor()
        {
            return $this->descriereSponsor;
        }
        
        /**
         * @param mixed $descriereSponsor
         */
        public function setDescriereSponsor($descriereSponsor)
        {
            $this->descriereSponsor = $descriereSponsor;
        }
       
    }