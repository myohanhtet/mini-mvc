<?php
namespace Myohanhtet\Config;
use PDO;

class DB
{
    private static $instance = NULL;

    public static function getInstance(): ?PDO
    {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO(
                'mysql:host=' . config('db.host') . ';dbname=' . config('db.dbname'),
                config('db.username'),
                config('db.password'),
                $pdo_options
            );
        }
        return self::$instance;
    }

    public static function beginTransaction(): void
    {
        self::getInstance()->beginTransaction();
    }

    public static function commit(): void
    {
        self::getInstance()->commit();
    }

    public static function rollBack(): void
    {
        self::getInstance()->rollBack();
    }
}