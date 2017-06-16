<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_log_procesos extends CI_Migration {

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
                ),
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('log_procesos');
            $datos = array(
                    array(
                        'proceso' => 'Lectura'
                    ),
                    array(
                        'proceso' => 'Edición'
                    ),
                    array(
                        'proceso' => 'Descarga'
                    ),
                    array(
                        'proceso' => 'Cambio Contraseña'
                    )
                );
            $this->db->insert_batch('smp_hv_log_procesos', $datos);
        }

        public function down()
        {
                $this->dbforge->drop_table('log_procesos');
        }
}