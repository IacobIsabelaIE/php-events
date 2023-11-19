<?php
    
    class ValidatorSponsor
    {
        
        const DATE_INTRARE_INVALIDE = "EROARE! Toate campurile sunt obligatoriu de completat";
        
        public static function valideazaSponsor(Sponsor $sponsor)
        {
            
            if (empty($sponsor->getNumeSponsor()) || empty($sponsor->getDescriereSponsor())) {
                print(self::DATE_INTRARE_INVALIDE);
                exit;
            }
            
        }
        
    }