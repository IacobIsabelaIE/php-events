<?php
    
    class Eveniment
    {
        private $eventId;
        
        private $titluEveniment;
        private $descriereEveniment;
        private $dataEveniment;
        private $locatie;
        private $partener;
        private $sponsor;
        private $pretEveniment;
        
        /**
         * @return mixed
         */
        public function getPretEveniment()
        {
            return $this->pretEveniment;
        }
        
        /**
         * @param mixed $pretEveniment
         */
        public function setPretEveniment($pretEveniment)
        {
            $this->pretEveniment = $pretEveniment;
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
        public function getTitluEveniment()
        {
            return $this->titluEveniment;
        }
        
        /**
         * @param mixed $titluEveniment
         */
        public function setTitluEveniment($titluEveniment)
        {
            $this->titluEveniment = $titluEveniment;
        }
        
        /**
         * @return mixed
         */
        public function getDescriereEveniment()
        {
            return $this->descriereEveniment;
        }
        
        /**
         * @param mixed $descriereEveniment
         */
        public function setDescriereEveniment($descriereEveniment)
        {
            $this->descriereEveniment = $descriereEveniment;
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
        public function getLocatie()
        {
            return $this->locatie;
        }
        
        /**
         * @param mixed $locatie
         */
        public function setLocatie($locatie)
        {
            $this->locatie = $locatie;
        }
        
        /**
         * @return mixed
         */
        public function getPartener()
        {
            return $this->partener;
        }
        
        /**
         * @param mixed $partener
         */
        public function setPartener($partener)
        {
            $this->partener = $partener;
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