<?php

namespace App\Models;

use CodeIgniter\Model;

class Horarios extends Model
{

    protected $table = 'horarios';
    protected $primaryKey = 'id_horario';
    protected $allowedFields = [
        "id_horario", "dia", "hora_entrada", "hora_salida"
    ];

    public function crear($datos)
    {
        $respuesta = $this->save($datos);
        return $respuesta;
    }

    public function getHorarios()
    {
        $datosHorarios = $this->select('horarios.dia, horarios.hora_entrada, horarios.hora_salida')->findAll();
        // $datos = ["datosHorarios" => $datosHorarios];
        return $datosHorarios;
        // return $datos;
    }
}
