<?php

namespace App\Models;

class AcaoModel
{
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
}
