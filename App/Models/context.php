<?php

namespace App\Models;

use PDO;
use PDOException;
use Framework\Database;

class context
{
    protected PDO $conn; // Injeta conexão PDO

    public function __construct(Database $db)
    {
        $this->conn = $db->conn; //recebe a conexão do Framework
    }


    // Método genérico para preparar e executar consultas
    protected function executeConsult(string $sql, array $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);

            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            die('Erro na execução da consulta: ' . $e->getMessage());
        }
    }


    // metodo de listar todos os produtos
    protected function listSql(string $sql, array $params = []): array
    {
        $stmt = $this->executeConsult($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function getoneWithSQL(string $sql, array $params = []): ?array
    {
        $stmt = $this->executeConsult($sql, $params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : null;
    }
}
