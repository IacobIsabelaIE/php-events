<?php
    
    class ValidatorSpeaker
    {
        
        const DATE_INTRARE_INVALIDE = "EROARE! Toate campurile sunt obligatoriu de completat";
        
        public static function valideazaSpeaker(Speaker $speaker)
        {
            
            
            if (empty($speaker->getNumeSpeaker()) || empty($speaker->getDescriereSpeaker())) {
                print(self::DATE_INTRARE_INVALIDE);
                exit;
            }
            
        }
        
    }