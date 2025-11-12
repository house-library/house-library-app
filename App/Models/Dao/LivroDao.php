<?php

namespace App\Models\Dao;

use App\Models\Context as ModelsContext;
use App\Models\Livro;
use Framework\Database;

class LivroDao extends ModelsContext
{
    public function __construct(Database $db)
    {
        parent::__construct($db);
    }

    // Listar todos os livros
    public function listAll(): array
    {
        $sql = 'SELECT L.*, C.descricao AS categoria_nome
                FROM LIVROS L
                LEFT JOIN CATEGORIA C ON L.categoria_id = C.categoria_id
                ORDER BY L.data_cadastro DESC';

        return $this->listSql($sql);
    }

    // Obter livro por ID
    public function getById(int $id): ?array
    {
        // Este JOIN é crucial - ele retorna 'categoria_nome'
        $sql = 'SELECT L.*, C.descricao AS categoria_nome
                FROM LIVROS L
                LEFT JOIN CATEGORIA C ON L.categoria_id = C.categoria_id
                WHERE L.livros_id = :id';

        return $this->getoneWithSQL($sql, [':id' => $id]);
    }

    // Listar livros relacionados por categoria
    public function getRelatedByCategory(
        int $categoriaId,
        int $excludeId,
        int $limit = 4,
    ): array {
        $sql = 'SELECT L.*, C.descricao AS categoria_nome
                FROM LIVROS L
                LEFT JOIN CATEGORIA C ON L.categoria_id = C.categoria_id
                WHERE L.categoria_id = :categoria_id 
                AND L.livros_id != :exclude_id 
                LIMIT :limit';

        return $this->listSql($sql, [
            ':categoria_id' => $categoriaId,
            ':exclude_id' => $excludeId,
            ':limit' => $limit,
        ]);
    }

    // Listar livros por categoria
    public function getByCategory(string $categoria, int $limit = 6): array
    {
        $sql =
            'SELECT L.*, C.descricao AS categoria_nome
            FROM LIVROS L
            INNER JOIN CATEGORIA C ON L.categoria_id = C.categoria_id
            WHERE C.descricao = :categoria
            AND C.status = \'A\'
            LIMIT ' . (int) $limit;
        return $this->listSql($sql, [
            ':categoria' => $categoria,
        ]);
    }

    // Inserir livro
    public function insert(Livro $livro): int
    {
        $sql = 'INSERT INTO LIVROS 
                (titulo, nome_autor, sinopse, descricao, ano_lancamento, 
                 idioma, preco, url_capa, categoria_id, faixa_etaria) 
                VALUES 
                (:titulo, :nome_autor, :sinopse, :descricao, :ano_lancamento, 
                 :idioma, :preco, :url_capa, :categoria_id, :faixa_etaria)';

        try {
            $stmt = $this->executeConsult($sql, [
                ':titulo' => $livro->titulo,
                ':nome_autor' => $livro->nome_autor,
                ':sinopse' => $livro->sinopse,
                ':descricao' => $livro->descricao,
                ':ano_lancamento' => $livro->ano_lancamento,
                ':idioma' => $livro->idioma,
                ':preco' => $livro->preco,
                ':url_capa' => $livro->url_capa,
                ':categoria_id' => $livro->categoria_id,
                ':faixa_etaria' => $livro->faixa_etaria,
            ]);

            // Retorna o ID do último registro inserido
            return (int) $this->conn->lastInsertId();
        } catch (\PDOException $e) {
            error_log('Erro ao inserir livro: ' . $e->getMessage());
            throw $e;
        }
    }

    // Atualizar livro
    public function update(Livro $livro): bool
    {
        $sql = 'UPDATE LIVROS SET 
                titulo = :titulo,
                nome_autor = :nome_autor,
                sinopse = :sinopse,
                descricao = :descricao,
                ano_lancamento = :ano_lancamento,
                idioma = :idioma,
                preco = :preco,
                url_capa = :url_capa,
                categoria_id = :categoria_id,
                faixa_etaria = :faixa_etaria
                WHERE livros_id = :id';

        try {
            $stmt = $this->executeConsult($sql, [
                ':titulo' => $livro->titulo,
                ':nome_autor' => $livro->nome_autor,
                ':sinopse' => $livro->sinopse,
                ':descricao' => $livro->descricao,
                ':ano_lancamento' => $livro->ano_lancamento,
                ':idioma' => $livro->idioma,
                ':preco' => $livro->preco,
                ':url_capa' => $livro->url_capa,
                ':categoria_id' => $livro->categoria_id,
                ':faixa_etaria' => $livro->faixa_etaria,
                ':id' => $livro->livros_id,
            ]);

            return $stmt->rowCount() > 0;
        } catch (\PDOException $e) {
            error_log('Erro ao atualizar livro: ' . $e->getMessage());
            throw $e;
        }
    }

    // Deletar livro
    public function delete(int $id): bool
    {
        $sql = 'DELETE FROM LIVROS WHERE livros_id = :id';

        try {
            $stmt = $this->executeConsult($sql, [':id' => $id]);
            return $stmt->rowCount() > 0;
        } catch (\PDOException $e) {
            error_log('Erro ao deletar livro: ' . $e->getMessage());
            throw $e;
        }
    }
}
