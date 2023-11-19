<?php
    
    class Speaker
    {
        private $speakerId;
        private $numeSpeaker;
        private $descriereSpeaker;
        
        private $ocupatieSpeaker;
        private $subiectAbordatSpeaker;
        
        /**
         * @return mixed
         */
        public function getSpeakerId()
        {
            return $this->speakerId;
        }
        
        /**
         * @param mixed $speakerId
         */
        public function setSpeakerId($speakerId)
        {
            $this->speakerId = $speakerId;
        }
        
        /**
         * @return mixed
         */
        public function getNumeSpeaker()
        {
            return $this->numeSpeaker;
        }
        
        /**
         * @param mixed $numeSpeaker
         */
        public function setNumeSpeaker($numeSpeaker)
        {
            $this->numeSpeaker = $numeSpeaker;
        }
        
        /**
         * @return mixed
         */
        public function getDescriereSpeaker()
        {
            return $this->descriereSpeaker;
        }
        
        /**
         * @param mixed $descriereSpeaker
         */
        public function setDescriereSpeaker($descriereSpeaker)
        {
            $this->descriereSpeaker = $descriereSpeaker;
        }
        
        /**
         * @return mixed
         */
        public function getOcupatieSpeaker()
        {
            return $this->ocupatieSpeaker;
        }
        
        /**
         * @param mixed $ocupatieSpeaker
         */
        public function setOcupatieSpeaker($ocupatieSpeaker)
        {
            $this->ocupatieSpeaker = $ocupatieSpeaker;
        }
        
        /**
         * @return mixed
         */
        public function getSubiectAbordatSpeaker()
        {
            return $this->subiectAbordatSpeaker;
        }
        
        /**
         * @param mixed $subiectAbordatSpeaker
         */
        public function setSubiectAbordatSpeaker($subiectAbordatSpeaker)
        {
            $this->subiectAbordatSpeaker = $subiectAbordatSpeaker;
        }
       
        
  
    }