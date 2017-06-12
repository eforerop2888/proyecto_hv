<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_tipos_documentos extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'tipo_documento' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('tipos_documentos');
                $datos = array(
                        array(
                                'tipo_documento' => 'Cedula de Ciudadania'
                        ),
                        array(
                                'tipo_documento' => 'Cedula Extranjeria'
                        ),
                        array(
                                'tipo_documento' => 'Pasaporte'
                        ),
                        array(
                                'tipo_documento' => 'Tarjeta de identidad'
                        )
                );
                $this->db->insert_batch('smp_hv_tipos_documentos', $datos);
        }

        public function down()
        {
                $this->dbforge->drop_table('tipos_documentos');
        }
}