<?php
    
    class Partener
    {
        private $partenerId;
        private $numePartener;
        private $descrierePartener;
        
        private $activitatePartener;
        
        private $cauzaPartener;
        
        /**
         * @return mixed
         */
        public function getCauzaPartener()
        {
            return $this->cauzaPartener;
        }
        
        /**
         * @param mixed $cauzaPartener
         */
        public function setCauzaPartener($cauzaPartener)
        {
            $this->cauzaPartener = $cauzaPartener;
        }
        
        
        /**
         * @return mixed
         */
        public function getPartenerId()
        {
            return $this->partenerId;
        }
        
        /**
         * @param mixed $partenerId
         */
        public function setPartenerId($partenerId)
        {
            $this->partenerId = $partenerId;
        }
        
        /**
         * @return mixed
         */
        public function getNumePartener()
        {
            return $this->numePartener;
        }
        
        /**
         * @param mixed $numePartener
         */
        public function setNumePartener($numePartener)
        {
            $this->numePartener = $numePartener;
        }
        
        /**
         * @return mixed
         */
        public function getDescrierePartener()
        {
            return $this->descrierePartener;
        }
        
        /**
         * @param mixed $descrierePartener
         */
        public function setDescrierePartener($descrierePartener)
        {
            $this->descrierePartener = $descrierePartener;
        }
        
        /**
         * @return mixed
         */
        public function getActivitatePartener()
        {
            return $this->activitatePartener;
        }
        
        /**
         * @param mixed $activitatePartener
         */
        public function setActivitatePartener($activitatePartener)
        {
            $this->activitatePartener = $activitatePartener;
        }
        
    }