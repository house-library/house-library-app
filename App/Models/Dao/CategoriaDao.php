<?php

namespace App\Models\Dao;

use App\Models\Categoria;
use App\Models\context as ModelsContext;
use Framework\Database;

class CategoriaDao extends ModelsContext
{
    public function __construct(Database $db)
    {
        parent::__construct($db);
    }

    public function listAll(): array
    {
        $sql = "
        SELECT 
            c.categoria_id, 
            c.descricao, 
            c.status,
            COUNT(l.livros_id) as total_livros
        FROM CATEGORIA c
        LEFT JOIN LIVROS l ON c.categoria_id = l.categoria_id
        GROUP BY c.categoria_id, c.descricao, c.status
        ORDER BY c.descricao ASC
    ";
        $results = $this->listSql($sql);
        return $results;
    }

    public function getById(int $id): ?Categoria
    {
        $sql = 'SELECT categoria_id, descricao, status, data_cadastro 
                FROM CATEGORIA 
                WHERE categoria_id = :id';

        $result = $this->getoneWithSQL($sql, [':id' => $id]);

        if (!$result) {
            return null;
        }

        return new Categoria(
            (int) $result['categoria_id'],
            $result['descricao'],
            $result['status'],
            $result['data_cadastro'],
        );
    }

    public function insert($categoria): bool
    {
        $sql =
            'INSERT INTO CATEGORIA (descricao, status) VALUES (:descricao, :status)';

        try {
            $stmt = $this->executeConsult($sql, [
                ':descricao' => $categoria->descricao,
                ':status' => $categoria->status,
            ]);
            return $stmt->rowCount() > 0;
        } catch (\PDOException $e) {
            error_log('Erro ao inserir categoria: ' . $e->getMessage());
            throw $e;
        }
    }

    public function update($categoria): bool
    {
        $sql =
            'UPDATE CATEGORIA SET descricao = :descricao, status = :status WHERE categoria_id = :id';
        try {
            $stmt = $this->executeConsult($sql, [
                ':descricao' => $categoria->descricao,
                ':status' => $categoria->status,
                ':id' => $categoria->categoria_id,
            ]);
            return $stmt->rowCount() > 0;
        } catch (\PDOException $e) {
            error_log('Erro ao atualizar categoria: ' . $e->getMessage());
            throw $e;
        }
    }

    public function delete(int $id)
    {
        $sql = 'DELETE FROM CATEGORIA WHERE categoria_id = :id';
        try {
            $stmt = $this->executeConsult($sql, [':id' => $id]);
        } catch (\PDOException $e) {
            error_log('Erro ao excluir categoria: ' . $e->getMessage());
            throw $e;
        }
    }
}
