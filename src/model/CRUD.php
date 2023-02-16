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

    public function create (string $tableName, array $columns, array $values ) {
        $placeholders = array_map(fn($column): string => $value = '?',$columns);
        try {
            $sql = 'INSERT INTO ' . $tableName . ' ( ' . implode(", ", $columns) . ') VALUES ('. implode(',', $placeholders).')';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($values);
            return true;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return false;
        }
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

    public function readColumns ($sql) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }

    public function update ($table, $column, $value, $col_id, $id): void
    {
        try {
            $sql = "UPDATE $table 
                    SET $column = ?
                    WHERE $col_id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$value, $id]);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo '<br>'. $this->error;
            throw new Exception ('Erreur dans CRUD - update');
        }

    }

    public function delete (string $table, int $id) {
        $sql = "DELETE FROM $table WHERE id_$table = $id";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return false;
        }

    }


}