<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_logros extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'logro' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'experiencia_laboral_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'null' => TRUE
                        ),
                        'fecha_creacion' => array(
                                'type' => 'TIMESTAMP',
                                'null' => TRUE
                        ),
                        'fecha_actualizacion' => array(
                                'type' => 'TIMESTAMP',
                                'null' => TRUE
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('logros');
                $this->dbforge->add_column('logros', ['CONSTRAINT fk_id_experiencia_laboral FOREIGN KEY(experiencia_laboral_id) REFERENCES smp_hv_experiencias_laborales(id)']);
        }

        public function down()
        {
                $this->dbforge->drop_table('logros');
        }
}