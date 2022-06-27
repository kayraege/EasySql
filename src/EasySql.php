<?php

namespace KAYEGA;

use PDO;
use PDOException;

class EasySql
{
    function __construct($host, $user, $pass, $db) {
        try {
            $conn = new PDO("mysql:host=$host,dbname=$db", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

?>