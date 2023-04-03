<?php

namespace App\Models;

use CodeIgniter\Model;

class Eventos extends Model
{

    protected $table = 'eventos';
    protected $primaryKey = 'id_evento';
    protected $allowedFields = [
        "id_evento", "usuario", "ip", "fecha", "evento"
    ];

    public function crear($datos)
    {
        $respuesta = $this->save($datos);
        return $respuesta;
    }
}
