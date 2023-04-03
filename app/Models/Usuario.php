<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuario extends Model
{

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = [
        "id_usuario", "nombre","email", "clave", "rol", "estado"
    ];

}
