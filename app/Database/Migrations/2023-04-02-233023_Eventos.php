<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Eventos extends Migration
{
    public function up()
    {
        $this->db->query("CREATE TABLE `eventos` (
            `id_evento` int(11) NOT NULL,
            `usuario` varchar(50) NOT NULL,
            `ip` varchar(50) NOT NULL,
            `fecha`  DATETIME NOT NULL,
            `evento` varchar(50) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        $this->db->query("ALTER TABLE `eventos`
        ADD PRIMARY KEY (`id_evento`);");

        $this->db->query("ALTER TABLE `eventos`
        MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT");
    }

    public function down()
    {
        $this->db->query("DROP TABLE `eventos`");
    }
}
