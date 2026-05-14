<?php

namespace App\Controllers;

use App\Services\AcoesService;

class AcoesController
{
    public function listar($input)
    {
        $service = new AcoesService();
        $dados = $service->obterProcessosTratados();

        header('Content-Type: application/json');
        return json_encode([
            "status" => "success",
            "data" => $dados
        ]);
    }
}
