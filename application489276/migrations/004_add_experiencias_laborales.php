<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_experiencias_laborales extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'cargo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => TRUE
                        ),
                        'empresa' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => TRUE
                        ),
                        'salario_basico' => array(
                                'type' => 'BIGINT',
                                'constraint' => 11,
                                'null' => TRUE
                        ),
                        'beneficios' => array(
                                'type' => 'TEXT',
                                'null' => TRUE
                        ),
                        'fecha_ingreso' => array(
                                'type' => 'TIMESTAMP',
                                'null' => TRUE      
                        ),
                        'fecha_retiro' => array(
                                'type' => 'TIMESTAMP',
                                'null' => TRUE
                        ),
                        'logros_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'null' => TRUE
                        ),
                        'persona_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'null' => TRUE
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('experiencias_laborales');
                $this->dbforge->add_column('experiencias_laborales', ['CONSTRAINT fk_id_personas FOREIGN KEY(persona_id) REFERENCES smp_hv_candidates(id)']);
        }

        public function down()
        {
                $this->dbforge->drop_table('experiencias_laborales');
        }
}