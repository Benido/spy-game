<?php

class CRUD
{
    private PDO $pdo;
    public string $error = '';

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

    public function create () {

    }

    public function read ($sql) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }

    public function update ($table, $column, $value, $col_id, $id): void
    {
        try {
            $sql = "UPDATE $table 
                    SET $column = '$value'
                    WHERE $col_id = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }

    }


}