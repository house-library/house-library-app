<?php declare(strict_types=1);

$data = [
    'title' => 'Login',
    'styles' => ['login.css'],
];

// 2. Chama a view e PASSA os dados
loadView('login', $data);
