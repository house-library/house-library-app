<?php

namespace App\Services;

use App\Models\Categoria;
use App\Models\Dao\CategoriaDao;
use Framework\Validation;

class CategoriaService
{
    public function __construct(private CategoriaDao $categoriaDao) {}

    public function adicionarCategoria(array $dados): bool
    {
        // Validações
        $errors = $this->validar($dados);

        if (!empty($errors)) {
            throw new \Exception(implode(', ', $errors));
        }

        // Sanitizar
        $descricao = sanitize($dados['descricao']);
        $status = $dados['status'] ?? 'A';

        // Criar objeto
        $categoria = new Categoria(null, $descricao, $status);

        // Inserir no banco
        return $this->categoriaDao->insert($categoria);
    }

    public function alterarCategoria(array $dados): bool
    {
        // Validações
        $errors = $this->validar($dados, true);

        if (!empty($errors)) {
            throw new \Exception(implode(', ', $errors));
        }

        // Sanitizar
        $id = (int) $dados['categoria_id'];
        $descricao = sanitize($dados['descricao']);
        $status = $dados['status'] ?? 'A';

        // Criar objeto
        $categoria = new Categoria($id, $descricao, $status);

        // Atualizar no banco
        return $this->categoriaDao->update($categoria);
    }

    private function validar(array $dados, bool $isUpdate = false): array
    {
        $errors = [];

        // Validar ID apenas em update
        if ($isUpdate && empty($dados['categoria_id'])) {
            $errors[] = 'ID da categoria é obrigatório';
        }

        // Validar descrição
        if (empty($dados['descricao'])) {
            $errors[] = 'Descrição é obrigatória';
        } elseif (!Validation::string($dados['descricao'], 3, 100)) {
            $errors[] = 'Descrição deve ter entre 3 e 100 caracteres';
        }

        // Validar status
        if (
            !empty($dados['status']) &&
            !in_array($dados['status'], ['A', 'I'])
        ) {
            $errors[] = 'Status inválido';
        }

        return $errors;
    }
}
