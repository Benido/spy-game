<?php

namespace app\src\model\DatabaseConnection;

use PDO;
use PDOException;

class DatabaseConnection
{
    public string $error = '';
    private $pdo;
    private $stmt;

    public function __construct() {
         try {
             $this->pdo = new PDO(
                 'mysql:host=localhost;dbname=spy_database;charset=utf8',
                 'root',
                 '',
                 [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
             );
         } catch (PDOException $e) {
             exit('Erreur : ' . $e->getMessage());
         }
     }

     public function __destruct() {
        if ($this->stmt !==null) { $this->stmt = null;}
        if ($this->pdo !== null) { $this->pdo = null;}
     }

     function select ($sql, $cond=null) {
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($cond);
            return $this->stmt->fetchAll();
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return false;
        }
     }
}