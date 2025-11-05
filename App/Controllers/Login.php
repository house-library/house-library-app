<?php
// Caminho: App/Controllers/CarrinhoController.php

namespace App\Controllers;

class Login
{
    public function index()
    {
        $data = [
            'title' => 'Login',
            'styles' => ['login.css'],
        ];

        loadView('login', $data);
    }
}
