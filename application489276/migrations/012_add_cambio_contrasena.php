<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_cambio_contrasena extends CI_Migration {

        public function up()
        {
            $this->dbforge->add_field(array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'usuario_id' => array(
                    'type' => 'INT',
                    'constraint' => 11,                                        
                    'null' => TRUE
                ),
                'token' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',                   
                    'null' => TRUE
                ),
                'estado' => array(
                    'type' => 'INT',
                    'constraint' => 2,                                        
                    'default' => 0
                ),
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('cambio_contrasena');
            $this->dbforge->add_column('cambio_contrasena', ['CONSTRAINT fk_id_candidate FOREIGN KEY(usuario_id) REFERENCES smp_hv_candidates(id)']);
        }

        public function down()
        {
                $this->dbforge->drop_table('cambio_contrasena');
        }
}