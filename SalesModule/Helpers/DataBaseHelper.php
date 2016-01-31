<?php

namespace SalesModule\Helpers;

use \PDO;

class DataBaseHelper {

    public static function getConnection() {
        $db = new PDO('mysql:host=' . DB_HOST  . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

} 