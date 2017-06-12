<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_estados_civiles extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'estado_civil' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('estados_civiles');
                $datos = array(
                        array(
                                'estado_civil' => 'Casado'
                        ),
                        array(
                                'estado_civil' => 'Separado'
                        ),
                        array(
                                'estado_civil' => 'Soltero'
                        ),
                        array(
                                'estado_civil' => 'Unión Libre'
                        )
                );
                $this->db->insert_batch('smp_hv_estados_civiles', $datos);
        }

        public function down()
        {
                $this->dbforge->drop_table('estados_civiles');
        }
}