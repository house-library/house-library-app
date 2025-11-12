<?php

namespace App\Models;

class Livro
{
    public function __construct(
        public ?int $livros_id = null,
        public ?string $titulo = null,
        public ?string $nome_autor = null,
        public ?string $sinopse = null,
        public ?string $descricao = null,
        public ?int $ano_lancamento = null,
        public ?string $idioma = null,
        public ?float $preco = null,
        public ?string $url_capa = null,
        public ?int $categoria_id = null,
        public ?string $faixa_etaria = null,
    ) {
        if ($this->data_cadastro === null) {
            date_default_timezone_set('America/Sao_Paulo');
            $this->data_cadastro = date('Y-m-d H:i:s');
        }
    }

    public function toArray(): array
    {
        return [
            'livros_id' => $this->livros_id,
            'titulo' => $this->titulo,
            'nome_autor' => $this->nome_autor,
            'sinopse' => $this->sinopse,
            'descricao' => $this->descricao,
            'ano_lancamento' => $this->ano_lancamento,
            'idioma' => $this->idioma,
            'preco' => $this->preco,
            'url_capa' => $this->url_capa,
            'categoria_id' => $this->categoria_id,
            'faixa_etaria' => $this->faixa_etaria,
        ];
    }

    public function atributosPreenchidos(): array
    {
        return array_filter(
            $this->toArray(),
            fn($value) => $value !== null && $value !== '',
        );
    }
}
