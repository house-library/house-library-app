<?php

namespace App\Models;

use PDO;
use PDOException;
use Framework\Database;

class context
{
    protected PDO $conn;

    public function __construct(Database $db)
    {
        $this->conn = $db->conn;
    }

    // Executa SQL preparado 
    protected function executeConsult(string $sql, array $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            
            
            foreach ($params as $key => $value) {
                // Se a chave for string (:nome), usa ela. Se for numero (0), soma 1 para virar param 1
                $paramKey = is_int($key) ? $key + 1 : $key;
                $stmt->bindValue($paramKey, $value);
            }

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            die('Erro na execução da consulta: ' . $e->getMessage());
        }
    }

    // Listagem genérica
    protected function listSql(string $sql, array $params = []): array
    {
        $stmt = $this->executeConsult($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Pegar um único registro
    protected function getoneWithSQL(string $sql, array $params = []): ?array
    {
        $stmt = $this->executeConsult($sql, $params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }


    protected function inserir(string $tabela, array $atributos, array $valores)
    {
        // INSERT INTO TABELA (nome, email) VALUES (?, ?)
        $colunas = implode(",", $atributos);
        $placeholders = implode(",", array_fill(0, count($valores), "?"));
        
        $sql = "INSERT INTO {$tabela} ({$colunas}) VALUES ({$placeholders})";
        
        $this->executeConsult($sql, $valores);
        return $this->conn->lastInsertId();
    }

    protected function atualizar(string $tabela, array $atributos, array $valores, int $id)
    {
        // UPDATE TABELA SET nome = ?, email = ? WHERE id = ?
        $set = implode(",", array_map(fn($attr) => "$attr = ?", $atributos));
        $sql = "UPDATE {$tabela} SET {$set} WHERE cliente_id = ?";
        
        // Adiciona o ID no final dos valores para o WHERE
        $params = array_merge($valores, [$id]);
        
        $stmt = $this->executeConsult($sql, $params);
        return $stmt->rowCount();
    }

    protected function deletar(string $tabela, string $colunaId, int $id)
    {
        // Monta: DELETE FROM TABELA WHERE cliente_id = ?
        $sql = "DELETE FROM {$tabela} WHERE {$colunaId} = ?";
        $stmt = $this->executeConsult($sql, [$id]);
        return $stmt->rowCount();
    }
}