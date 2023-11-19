<?php
    
    class ValidatorEvenimente
    {
        
        const DATE_INTRARE_INVALIDE = "EROARE! Toate campurile sunt obligatoriu de completat";
        const PRET_INVALID_VALOARE = "EROARE! Pretul trebuie sa fie o valoare numerica";
        
        public static function valideazaEveniment(Eveniment $event)
        {
            if (!is_numeric($event->getPretEveniment())) {
                print(self::PRET_INVALID_VALOARE);
                exit;
            }
            
            if (empty($event->getTitluEveniment()) || empty($event->getDescriereEveniment() ||
                    empty($event->getDataEveniment() || empty($event->getLocatie() ||
                            empty($event->getSponsor() || empty($event->getPartener()|| empty($event->getSpeaker()) || empty($event->getPretEveniment()))))))) {
                print(self::DATE_INTRARE_INVALIDE);
                exit;
            }
        }
        
    }