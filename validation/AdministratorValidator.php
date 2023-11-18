<?php
    
    class AdministratorValidator
    {
        const INVALID_INPUT = "EROARE! Toate campurile sunt obligatoriu de completat pentru administratori";
        const INVALID_USERNAME = "EROARE! Numele administratorului trebuie sa contina litere si cifre";
        const INVALID_EMAIL = "EROARE! E-mailul nu este valid";
        const INVALID_USER_ALREADY_EXISTS = "EROARE! Administratorul deja exista in baza de date";
        
        public static function validateAdministrator(Administrator $admin, AdministratorDAO $administratorDAO) {
            self::validateAdministratorInput($admin);
            self::validateAdministratorUserName($admin);
            self::validateAdministratorEmail($admin);
            self::validateAdministratorNotExists($admin, $administratorDAO);
        }
        
        private static function validateAdministratorInput(Administrator $admin)
        {
            if (empty($admin->getUserName()) || empty($admin->getFirstName()) || empty($admin->getLastName())
                || empty($admin->getEmail()) || empty($admin->getPassword())) {
                print(self::INVALID_INPUT);
                exit;
            }
        }
        
        private static function validateAdministratorUserName(Administrator $admin) {
            if (!preg_match("/^[a-zA-Z0-9]*$/", $admin->getUserName())) {
                print(self::INVALID_USERNAME);
                exit;
            }
        }
        
        private static function validateAdministratorEmail(Administrator $admin) {
            if (!filter_var($admin->getEmail(), FILTER_VALIDATE_EMAIL)) {
                print(self::INVALID_EMAIL);
                exit;
            }
        }
        
        
        private static function validateAdministratorNotExists(Administrator $admin, AdministratorDAO $administratorDAO) {
            $administratorExists = $administratorDAO->doesAdministratorExist($admin);
            if ($administratorExists) {
                print(self::INVALID_USER_ALREADY_EXISTS);
                exit;
            }
        }
        
    }