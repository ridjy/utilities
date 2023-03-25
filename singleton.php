<?php

class Database
{
    private static $_instance;

    private function __construct() {}
    
    private function __clone(){}

    public static function getInstance()
    {
        if(is_null(self::$_instance)) {
            self::$_instance = new Database();  
        }
 
        return self::$_instance;
    }
}

var_dump(Database::getInstance());