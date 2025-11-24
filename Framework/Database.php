<?php

namespace Framework;

use PDO;
use PDOException;
use Exception;
use PDOStatement;

class Database
{
    public $conn;

    public function __construct(array $config)
    {
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset=utf8mb4";

        $sslCaPath = $this->getSslCaPath();

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

            PDO::MYSQL_ATTR_SSL_CA => $sslCaPath,
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

    private function getSslCaPath(): string
    {
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
