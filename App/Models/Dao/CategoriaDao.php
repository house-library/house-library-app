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
        $sql =
            'SELECT categoria_id, descricao, status, data_cadastro FROM CATEGORIA ORDER BY descricao ASC';
        $results = $this->listSql($sql);

        $categorias = [];
        foreach ($results as $row) {
            $categorias[] = new Categoria( //
                (int) $row['categoria_id'],
                $row['descricao'],
                $row['status'],
                $row['data_cadastro'],
            );
        }

        return $categorias;
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
        // Corrigido: Parâmetro é Categoria
        $sql =
            'INSERT INTO CATEGORIA (descricao, status) VALUES (:descricao, :status)';

        try {
            $stmt = $this->executeConsult($sql, [
                ':descricao' => $categoria->descricao, // Corrigido: Usa $categoria
                ':status' => $categoria->status, // Corrigido: Usa $categoria
            ]);
            return $stmt->rowCount() > 0; // Corrigido: Retorna true se bem-sucedido
        } catch (\PDOException $e) {
            error_log('Erro ao inserir categoria: ' . $e->getMessage());
            throw $e;
        }
    }

    public function update($categoria): bool
    {
        // Corrigido: Parâmetro é Categoria
        $sql =
            'UPDATE CATEGORIA SET descricao = :descricao, status = :status WHERE categoria_id = :id';
        try {
            $stmt = $this->executeConsult($sql, [
                ':descricao' => $categoria->descricao, // Corrigido: Usa $categoria
                ':status' => $categoria->status, // Corrigido: Usa $categoria
                ':id' => $categoria->categoria_id,
            ]);
            return $stmt->rowCount() > 0; // Corrigido: Retorna true se bem-sucedido
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
