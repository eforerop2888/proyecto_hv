<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_procesos_correos extends CI_Migration {

        public function up()
        {
            $this->dbforge->add_field(array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'proceso' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null' => TRUE
                )
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('procesos_correos');
            $datos = array(
                    array(
                        'proceso' => 'Envio correos creación candidato'
                    ),
                    array(
                        'proceso' => 'Envio correos recuperacion contraseña'
                    )
                );
                $this->db->insert_batch('smp_hv_procesos_correos', $datos);
        }

        public function down()
        {
            $this->dbforge->drop_table('procesos_correos');
        }
}