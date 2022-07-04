<?php
require_once "config.php";

class Database
{
    private $conn;

    /**
     * @return mixed
     */
    public function getConn(){
        try {
            $this->setConn(new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS));
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
            $this->conn->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_NATURAL);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $this->conn;
    }
    /**
     * @param mixed $conn
     */
    public function setConn($conn): void{
        $this->conn = $conn;
    }



}