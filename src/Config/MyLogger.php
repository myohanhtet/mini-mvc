<?php

namespace Myohanhtet\Config;

use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class MyLogger
{
    private static $logger;

    public static function getLogger()
    {
        if (!self::$logger) {
            self::$logger = new Logger('app');
            self::$logger->pushHandler(new RotatingFileHandler(__DIR__ . '/../logs/app.log', 5, Logger::INFO, true, 0775, true));
        }
        return self::$logger;
    }
}