<?php

namespace App\Services;

use App\Models\AcaoModel;

class AcoesService
{
    public function obterProcessosTratados()
    {
        $model = new AcaoModel();
        $processos = $model->getAll();

        return array_map(function ($p) {
            // A "inteligência" do service funcionando
            $p['urgente'] = ($p['status'] === 'Prazo Final');
            return $p;
        }, $processos);
    }
}
