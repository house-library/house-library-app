<?php

// Carregar variáveis do .env
if (file_exists(__DIR__ . '/.env')) {
    $lines = file(
        __DIR__ . '/.env',
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

// Tentar conectar
$host = $_ENV['DB_HOST'] ?? 'localhost';
$port = $_ENV['DB_PORT'] ?? 3306;
$dbname = $_ENV['DB_NAME'] ?? 'defaultdb';
$user = $_ENV['DB_USER'] ?? 'root';
$pass = $_ENV['DB_PASSWORD'] ?? '';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    echo '✅ Conexão bem-sucedida com o banco de dados!';
} catch (PDOException $e) {
    echo '❌ Erro na conexão: ' . $e->getMessage();
}
