<?php

namespace Creational\Singleton\MultiThread;

class Logger
{
    private static ?Logger $instance = null;
    private static $lock = null;

    private function __construct()
    {
        echo "Logger initialized\n";
    }

    public static function getInstance(): Logger
    {
        if (self::$instance === null) {

            if(self::$lock === null) {
                self::$lock = fopen(__FILE__, 'r'); // simple lock
            }

            flock(self::$lock, LOCK_SH);
            
            if (self::$instance === null) {
                self::$instance = new self();
            }

            flock(self::$lock, LOCK_UN);
        }

        return self::$instance;
    }

}