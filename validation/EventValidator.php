<?php
    
    class EventValidator
    {
        
        const MESSAGE = "EROARE! Toate campurile sunt obligatoriu de completat";
        
        public static function validateEvent(Event $event)
        {
            if (empty($event->getEventTitle()) || empty($event->getEventDescription() ||
                    empty($event->getDateTime() || empty($event->getLocation() ||
                            empty($event->getSponsor() || empty($event->getPartner())))))) {
                print(self::MESSAGE);
                exit;
            }
        }
        
    }