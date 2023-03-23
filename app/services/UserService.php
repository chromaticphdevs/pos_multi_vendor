<?php
    namespace Services;

    class UserService {
        const ADMIN = 'ADMINISTRATOR';
        const VENDOR = 'VENDOR';
        const STAFF = 'STAFF';


        public static function getTypes(){
            return [
                self::ADMIN,
                self::VENDOR,
                self::STAFF
            ];
        }
    }