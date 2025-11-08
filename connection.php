<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/helpers.php';

use Framework\Database;

try {
    $config = require basePath('config/db.php');

    $tables = $db->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);

    foreach ($tables as $table) {
        echo "{$table}";
    }

    $result = $db->query('SELECT COUNT(*) as total FROM LIVROS')->fetch();
} catch (Exception $e) {
    echo 'ERRO:' . $e->getMessage();
}
