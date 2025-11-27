<?php

namespace App\Controllers\index;

use Framework\Database;

class Paginas
{
    public function sobreNos(): void
    {
        $data = [
            'title' => 'Sobre Nos',
            'styles' => ['paginas.css'],
        ];

        loadView('Paginas/sobre-nos', $data);
    }

    public function trabalheConosco(): void
    {
        $data = [
            'title' => 'Trabalhe Conosco',
            'styles' => ['paginas.css'],
        ];

        loadView('Paginas/trabalhe-conosco', $data);
    }

    public function devolucoes(): void
    {
        $data = [
            'title' => 'devolucoes',
            'styles' => ['paginas.css'],
        ];

        loadView('Paginas/devolucoes', $data);
    }
}
