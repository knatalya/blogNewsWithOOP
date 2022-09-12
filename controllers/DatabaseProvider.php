<?php
    require_once __DIR__ . '/../config.php';
    require_once __DIR__ . '/../vendor/autoload.php';

    class DatabaseProvider
    {
        private static $db = null;

        /**
         * Получение единственного экземпляра базы данных
         *
         * @return PDO|null
         */
        public static function getDb(): ?PDO
        {
            if (self::$db === null) {
                self::$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
                self::$db->exec("set names utf8");
            }
            return self::$db;
        }
    }