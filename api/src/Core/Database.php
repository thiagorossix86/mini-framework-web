<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;

    /**
     * Retorna a conexão única com o banco de dados (Singleton)
     */
    public static function getConnection()
    {
        if (self::$instance === null) {
            try {
                // O phpdotenv injeta os valores em $_ENV
                $host    = $_ENV['DB_HOST'] ?? 'localhost';
                $dbName  = $_ENV['DB_NAME'] ?? '';
                $user    = $_ENV['DB_USER'] ?? '';
                $pass    = $_ENV['DB_PASS'] ?? '';
                $charset = $_ENV['DB_CHARSET'] ?? 'utf8mb4';

                $dsn = "mysql:host=$host;dbname=$dbName;charset=$charset";

                // Configurações recomendadas para alta performance e segurança
                $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false, // Usa prepared statements reais
                ];

                self::$instance = new PDO($dsn, $user, $pass, $options);
            } catch (PDOException $e) {
                header('Content-Type: application/json');
                http_response_code(500);
                echo json_encode([
                    "success" => false,
                    "error" => "Erro interno de conexão."
                ]);
                exit;
            }
        }
        return self::$instance;
    }
}
