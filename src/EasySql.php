<?php

namespace KAYEGA;

use Exception;
use PDO;
use PDOException;

class EasySql
{
    public $conn;

    public function __construct($host, $user, $pass, $db) {
        try {
            $this->conn = new PDO("mysql:host=$host,dbname=$db", $user, $pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function query($sql) {
        if (!$sql) {
            return new Error("SQL NEEDED!");
        }
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            return new Error($e->getMessage());
        }
    }

    public function dbExistsOneValue($table, $varName, $varValue) {
        if (!$varName || !$varValue) {
            return new Error("Var name or var value empty!");
        }
        try {
            $stmt = $this->conn->prepare("SELECT * FROM ".$table." WHERE $varName='".$varValue."'");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return new Error($e->getMessage());
        }
    }
}

class Error extends Exception { }

?>