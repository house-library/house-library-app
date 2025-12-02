<?php

namespace App\Models\Dao;

use App\Models\context as ModelsContext;
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
                ORDER BY L.livros_id DESC';

        return $this->listSql($sql);
    }

    public function listAllPaginated($limit, $offset): array
    {
        $sql = 'SELECT L.*, C.descricao AS categoria_nome
                FROM LIVROS L
                LEFT JOIN CATEGORIA C ON L.categoria_id = C.categoria_id
                ORDER BY L.livros_id ASC
                LIMIT :limit OFFSET :offset';

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function countAll(): int
    {
        $sql = 'SELECT COUNT(*) as total FROM LIVROS';
        $result = $this->getoneWithSQL($sql);
        return (int) $result['total'];
    }

    public function listDistinctAuthors(): array
    {
        $sql = 'SELECT DISTINCT nome_autor 
                FROM LIVROS 
                ORDER BY nome_autor ASC';

        return $this->listSql($sql);
    }

    public function listDistinctCategory(): array
    {
        $sql = 'SELECT DISTINCT categoria_id, descricao
                FROM CATEGORIA
                ORDER BY descricao ASC';

        return $this->listSql($sql);
    }

    public function listDistinctLanguage(): array
    {
        $sql = 'SELECT DISTINCT idioma
                FROM LIVROS
                ORDER BY idioma ASC';

        return $this->listSql($sql);
    }

    public function listDistinctYear(): array
    {
        $sql = 'SELECT DISTINCT ano_lancamento
                FROM LIVROS
                ORDER BY ano_lancamento ASC';

        return $this->listSql($sql);
    }

    // Obter livro por ID
    public function getById(int $id): ?array
    {
        $sql = 'SELECT L.*, C.descricao AS categoria_nome
                FROM LIVROS L
                LEFT JOIN CATEGORIA C ON L.categoria_id = C.categoria_id
                WHERE L.livros_id = :id';

        return $this->getoneWithSQL($sql, [':id' => $id]);
    }

    // busca os livros com base no id q está na sessao
    public function getByIds(array $ids): array
    {
        if (empty($ids)) {
            return [];
        }

        $idsSanitizados = array_map('intval', $ids);
        $idsString = implode(',', $idsSanitizados);

        $sql = "SELECT L.*, C.descricao AS categoria_nome
                FROM LIVROS L
                LEFT JOIN CATEGORIA C ON L.categoria_id = C.categoria_id
                WHERE L.livros_id IN ($idsString)";

        return $this->listSql($sql);
    }

    // Listar livros relacionados por categoria
    public function getRelatedByCategory(
        int $categoriaId,
        int $excludeId,
        int $limit = 4,
    ): array {
        $sql =
            'SELECT L.*, C.descricao AS categoria_nome
                FROM LIVROS L
                LEFT JOIN CATEGORIA C ON L.categoria_id = C.categoria_id
                WHERE L.categoria_id = :categoria_id 
                AND L.livros_id != :exclude_id 
                LIMIT ' . (int) $limit;

        return $this->listSql($sql, [
            ':categoria_id' => $categoriaId,
            ':exclude_id' => $excludeId,
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

    // filtros

    public function listFiltered(array $filtros, int $limit, int $offset): array
    {
        $sql = 'SELECT L.*, C.descricao AS categoria_nome
                FROM LIVROS L
                LEFT JOIN CATEGORIA C ON L.categoria_id = C.categoria_id
                WHERE 1=1';

        $params = [];

        // cláusulas WHERE dinamicas
        if (!empty($filtros['autor'])) {
            $sql .= ' AND L.nome_autor = :autor';
            $params[':autor'] = $filtros['autor'];
        }

        if (!empty($filtros['categoria'])) {
            $sql .= ' AND L.categoria_id = :categoria';
            $params[':categoria'] = $filtros['categoria'];
        }

        if (!empty($filtros['ano'])) {
            $sql .= ' AND L.ano_lancamento = :ano';
            $params[':ano'] = $filtros['ano'];
        }

        if (!empty($filtros['idioma'])) {
            $sql .= ' AND L.idioma = :idioma';
            $params[':idioma'] = $filtros['idioma'];
        }

        // ordenação e paginação
        $sql .= ' ORDER BY L.livros_id ASC LIMIT :limit OFFSET :offset';

        $stmt = $this->conn->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // total de resultados
    public function countFiltered(array $filtros): int
    {
        $sql = 'SELECT COUNT(*) as total FROM LIVROS L WHERE 1=1';
        $params = [];

        if (!empty($filtros['autor'])) {
            $sql .= ' AND L.nome_autor = :autor';
            $params[':autor'] = $filtros['autor'];
        }
        if (!empty($filtros['categoria'])) {
            $sql .= ' AND L.categoria_id = :categoria';
            $params[':categoria'] = $filtros['categoria'];
        }
        if (!empty($filtros['ano'])) {
            $sql .= ' AND L.ano_lancamento = :ano';
            $params[':ano'] = $filtros['ano'];
        }
        if (!empty($filtros['idioma'])) {
            $sql .= ' AND L.idioma = :idioma';
            $params[':idioma'] = $filtros['idioma'];
        }

        $result = $this->getoneWithSQL($sql, $params);
        return (int) $result['total'];
    }

    // barra de busca
    public function buscaPorTermo(string $termo): array
    {
        $sql = 'SELECT L.*, C.descricao AS categoria_nome
                FROM LIVROS L
                LEFT JOIN CATEGORIA C ON L.categoria_id = C.categoria_id
                WHERE L.titulo LIKE :termo 
                OR L.nome_autor LIKE :termo
                ORDER BY L.titulo ASC';

        return $this->listSql($sql, [':termo' => "%{$termo}%"]);
    }

    public function buscaPorTermoPaginada(string $termo, int $limit, int $offset): array
    {
        $sql = 'SELECT L.*, C.descricao AS categoria_nome
                FROM LIVROS L
                LEFT JOIN CATEGORIA C ON L.categoria_id = C.categoria_id
                WHERE L.titulo LIKE :termo 
                OR L.nome_autor LIKE :termo
                ORDER BY L.titulo ASC
                LIMIT :limit OFFSET :offset';

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':termo', "%{$termo}%");
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function contarBuscaPorTermo(string $termo): int
    {
        $sql = 'SELECT COUNT(*) as total 
                FROM LIVROS L
                WHERE L.titulo LIKE :termo 
                OR L.nome_autor LIKE :termo';

        $result = $this->getoneWithSQL($sql, [':termo' => "%{$termo}%"]);
        return (int) $result['total'];
    }
}
