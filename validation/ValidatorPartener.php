<?php
    
    class ValidatorPartener
    {
        
        const DATE_INTRARE_INVALIDE = "EROARE! Toate campurile sunt obligatoriu de completat";
        
        public static function valideazaPartener(Partener $partener)
        {
            
            
            if (empty($partener->getNumePartener()) || empty($partener->getDescrierePartener()) ||empty($partener->getActivitatePartener()) || empty($partener->getCauzaPartener()) ) {
                print(self::DATE_INTRARE_INVALIDE);
                exit;
            }
            
        }
        
    }