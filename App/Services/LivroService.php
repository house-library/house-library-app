<?php

namespace App\Services;

use App\Models\Livro;
use App\Models\Dao\LivroDao;
use App\Models\Dao\CategoriaDao;
use Framework\Validation;

class LivroService
{
    // Construtor
    public function __construct(
        private LivroDao $livroDao,
        private CategoriaDao $categoriaDao,
    ) {}

    public function adicionarLivro(array $dados, ?string $urlCapa = null)
    {
        // Validações
        $errors = $this->validar($dados);

        if (!empty($errors)) {
            throw new \Exception(implode(', ', $errors));
        }

        // Criar objeto
        $livro = new Livro(
            null,
            sanitize($dados['titulo']),
            sanitize($dados['nome_autor']),
            sanitize($dados['sinopse']),
            sanitize($dados['descricao']),
            (int) $dados['ano_lancamento'],
            sanitize($dados['idioma']),
            (float) $dados['preco'],
            $urlCapa,
            (int) $dados['categoria_id'],
            $dados['faixa_etaria'] ?? null,
        );

        // Inserir no banco
        return $this->livroDao->insert($livro);
    }

    public function alterarLivro(array $dados, ?string $urlCapa = null): bool
    {
        // Validações
        $errors = $this->validar($dados, true);

        if (!empty($errors)) {
            throw new \Exception(implode(', ', $errors));
        }

        // Sanitizar
        $id = (int) $dados['livros_id'];
        $livroExistente = $this->livroDao->getById($id);

        // Criar objeto atualizado
        $livro = new Livro(
            $id,
            sanitize($dados['titulo']),
            sanitize($dados['nome_autor']),
            sanitize($dados['sinopse']),
            sanitize($dados['descricao']),
            (int) $dados['ano_lancamento'],
            sanitize($dados['idioma']),
            (float) $dados['preco'],
            $urlCapa ?? ($livroExistente['url_capa'] ?? null), // Mantém capa antiga se não houver nova
            (int) $dados['categoria_id'],
            $dados['faixa_etaria'] ?? null,
        );

        // Atualizar no banco
        return $this->livroDao->update($livro);
    }

    private function validar(array $dados, bool $isUpdate = false): array
    {
        $errors = [];

        // Validar ID apenas em update
        if ($isUpdate && empty($dados['livros_id'])) {
            $errors[] = 'ID do livro é obrigatório';
        }

        // Validar título
        if (empty($dados['titulo'])) {
            $errors[] = 'Título é obrigatório';
        } elseif (!Validation::string($dados['titulo'], 1, 100)) {
            $errors[] = 'Título deve ter entre 1 e 100 caracteres';
        }

        // Validar autor
        if (empty($dados['nome_autor'])) {
            $errors[] = 'Nome do autor é obrigatório';
        } elseif (!Validation::string($dados['nome_autor'], 1, 100)) {
            $errors[] = 'Nome do autor deve ter entre 1 e 100 caracteres';
        }

        // Validar sinopse
        if (empty($dados['sinopse'])) {
            $errors[] = 'Sinopse é obrigatória';
        }

        // Validar descrição
        if (empty($dados['descricao'])) {
            $errors[] = 'Descrição é obrigatória';
        }

        // Validar ano
        if (empty($dados['ano_lancamento'])) {
            $errors[] = 'Ano de lançamento é obrigatório';
        } elseif (!is_numeric($dados['ano_lancamento'])) {
            $errors[] = 'Ano deve ser numérico';
        } elseif (
            $dados['ano_lancamento'] < 1000 ||
            $dados['ano_lancamento'] > date('Y')
        ) {
            $errors[] = 'Ano inválido';
        }

        // Validar idioma
        if (empty($dados['idioma'])) {
            $errors[] = 'Idioma é obrigatório';
        }

        // Validar preço
        if (empty($dados['preco'])) {
            $errors[] = 'Preço é obrigatório';
        } elseif (!is_numeric($dados['preco'])) {
            $errors[] = 'Preço deve ser numérico';
        } elseif ($dados['preco'] < 0) {
            $errors[] = 'Preço não pode ser negativo';
        }

        // Validar categoria
        if (empty($dados['categoria_id'])) {
            $errors[] = 'Categoria é obrigatória';
        } elseif (!is_numeric($dados['categoria_id'])) {
            $errors[] = 'ID da Categoria inválido.';
        }

        return $errors;
    }
}
