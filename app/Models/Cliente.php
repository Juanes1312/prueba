<?php

namespace App\Models;

use CodeIgniter\Model;

class Cliente extends Model
{
    protected $table = 'horarios';
    protected $primaryKey = 'id_horario';
    protected $allowedFields = [
        "id_horario", "hora_entrada", "hora_salida"
    ];

}
