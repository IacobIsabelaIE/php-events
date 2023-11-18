<?php
    
    class ValidatorAdministrator
    {
        const DATE_INTRARE_INVALIDE = "EROARE! Toate campurile sunt obligatoriu de completat pentru administratori";
        const NUME_UTILIZATOR_INVALID = "EROARE! Numele administratorului trebuie sa contina litere si cifre";
        const EMAIL_INVALID = "EROARE! E-mailul nu este valid";
        const UTILIZATOR_EXISTA = "EROARE! Administratorul deja exista in baza de date";
        
        public static function validateAdministrator(Administrator $admin, AdministratorDB $administratorDAO) {
            self::validateAdministratorInput($admin);
            self::validateAdministratorUserName($admin);
            self::validateAdministratorEmail($admin);
            self::validateAdministratorNotExists($admin, $administratorDAO);
        }
        
        private static function validateAdministratorInput(Administrator $admin)
        {
            if (empty($admin->getNumeUtilizator()) || empty($admin->getNume()) || empty($admin->getPrenume())
                || empty($admin->getEmail()) || empty($admin->getPassword())) {
                print(self::DATE_INTRARE_INVALIDE);
                exit;
            }
        }
        
        private static function validateAdministratorUserName(Administrator $admin) {
            if (!preg_match("/^[a-zA-Z0-9]*$/", $admin->getNumeUtilizator())) {
                print(self::NUME_UTILIZATOR_INVALID);
                exit;
            }
        }
        
        private static function validateAdministratorEmail(Administrator $admin) {
            if (!filter_var($admin->getEmail(), FILTER_VALIDATE_EMAIL)) {
                print(self::EMAIL_INVALID);
                exit;
            }
        }
        
        
        private static function validateAdministratorNotExists(Administrator $admin, AdministratorDB $administratorDAO) {
            $administratorExists = $administratorDAO->verificaAdministratorExistent($admin);
            if ($administratorExists) {
                print(self::UTILIZATOR_EXISTA);
                exit;
            }
        }
        
    }