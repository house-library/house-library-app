<?php

namespace App\Models;

class Categoria
{
    public ?int $categoria_id;
    public string $descricao;
    public string $status;

    public function __construct(
        $categoria_id = '',
        $descricao = '',
        $status = '',
    ) {
        $this->categoria_id = $categoria_id;
        $this->descricao = $descricao;
        $this->status = $status;
    }

    // Retorna array com dados preenchidos
    public function toArray()
    {
        return [
            'categoria_id' => $this->categoria_id,
            'descricao' => $this->descricao,
            'status' => $this->status,
        ];
    }

    public function atributosPreenchidos()
    {
        // Filtra os valores vazios
        return array_filter(
            $this->toArray(),
            fn($value) => $value !== null && $value !== '',
        );
    }
}
