<?php
    
    class EventValidator
    {
        
        const MESSAGE = "EROARE! Toate campurile sunt obligatoriu de completat";
        const INVALID_PRICE_MESSAGE = "EROARE! Pretul trebuie sa fie o valoare numerica";
        
        public static function validateEvent(Event $event)
        {
            if (!is_numeric($event->getEventPrice())) {
                print(self::INVALID_PRICE_MESSAGE);
                exit;
            }
            
            if (empty($event->getEventTitle()) || empty($event->getEventDescription() ||
                    empty($event->getDateTime() || empty($event->getLocation() ||
                            empty($event->getSponsor() || empty($event->getPartner() || empty($event->getEventPrice()))))))) {
                print(self::MESSAGE);
                exit;
            }
        }
        
    }