<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class AcaoModel
{
    private $db;

    public function __construct()
    {
        // Obtém a instância única da conexão PDO
        $this->db = Database::getConnection();
    }

    public function getAll()
    {
        // Simulando o retorno do Banco de Dados
        return [
            [
                "id" => 1,
                "numero_processo" => "0012345-67.2026.8.26.0576",
                "cliente" => "Thiago Rossi",
                "status" => "Prazo Final"
            ],
            [
                "id" => 2,
                "numero_processo" => "0098765-43.2026.8.26.0000",
                "cliente" => "Engenharia de Software LTDA",
                "status" => "Em Andamento"
            ]
        ];
    }

    /**
     * Busca todas as ações do banco de dados
     */
    // public function getAll() {
    //     try {
    //         // SQL Puro: Máxima performance e controle
    //         // Note que estamos buscando apenas as colunas necessárias
    //         $sql = "SELECT id, numero_processo, cliente, status FROM acoes ORDER BY id DESC";
            
    //         $stmt = $this->db->prepare($sql);
    //         $stmt->execute();

    //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
    //     } catch (\PDOException $e) {
    //         // Em produção, você logaria isso em um arquivo
    //         error_log("Erro na busca de ações: " . $e->getMessage());
    //         return [];
    //     }
    // }
}
