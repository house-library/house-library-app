<?php

namespace Framework;

use PDO;
use PDOException;
use Exception;
use PDOStatement;

class Database
{
    // conexão com banco de dados
    public $conn;

    public function __construct(array $config)
    {
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset=utf8mb4";

        // Chama a função basePath fora da array $options e fora da inicialização do PDO
        // Atribui o resultado a uma variável local
        $sslCaPath = $this->getSslCaPath();

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

            //conexao com o banco online no aiven
            PDO::MYSQL_ATTR_SSL_CA => $sslCaPath, // <-- Usa a variável
        ];

        try {
            $this->conn = new PDO(
                $dsn,
                $config['username'],
                $config['password'],
                $options,
            );
        } catch (PDOException $e) {
            throw new Exception(
                'Database connection failed: ' . $e->getMessage(),
            );
        }
    }

    // Método privado para encapsular a chamada à função global basePath
    // Isso garante que a chamada ocorra dentro de uma função do namespace Framework
    // e o Composer terá carregado o helpers.php antes da chamada a __construct
    private function getSslCaPath(): string
    {
        // Chama explicitamente a função do escopo global
        return \basePath('config/ca.pem');
    }

    // consulta ao banco de dados
    public function query(string $query, array $params = []): PDOStatement
    {
        try {
            $sth = $this->conn->prepare($query);

            $sth->execute($params);

            return $sth;
        } catch (PDOException $e) {
            throw new Exception("Query failed to execute: {$e->getMessage()}");
        }
    }
}
