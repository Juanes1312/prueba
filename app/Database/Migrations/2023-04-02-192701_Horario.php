<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Horario extends Migration
{
    public function up()
    {
        $this->db->query("CREATE TABLE `horarios` (
            `id_horario` int(11) NOT NULL,
            `dia` int(2) NOT NULL,
            `hora_entrada` TIME NOT NULL ,
            `hora_salida` TIME NOT NULL 
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        $this->db->query("ALTER TABLE `horarios`
        ADD PRIMARY KEY (`id_horario`);");

        $this->db->query("ALTER TABLE `horarios`
        MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT");
    }

    public function down()
    {
        $this->db->query("DROP TABLE `horarios`");
    }
}
