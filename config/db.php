<?php

// Carregar variáveis do arquivo .env
if (file_exists(__DIR__ . '/../.env')) {
    $lines = file(
        __DIR__ . '/../.env',
        FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES,
    );
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
            [$key, $value] = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            if (!array_key_exists($key, $_ENV)) {
                $_ENV[$key] = $value;
            }
        }
    }
}

// Agora, usar as variáveis de ambiente
return [
    'host' => $_ENV['DB_HOST'] ?? 'localhost',
    'port' => (int) ($_ENV['DB_PORT'] ?? 3306),
    'dbname' => $_ENV['DB_NAME'] ?? 'defaultdb',
    'username' => $_ENV['DB_USER'] ?? 'root',
    'password' => $_ENV['DB_PASSWORD'] ?? '',
];
