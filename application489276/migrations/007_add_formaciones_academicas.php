<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_formaciones_academicas extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'titulo_otorgado' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => TRUE
                        ),
                        'nombre_institucion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => TRUE
                        ),
                        'año' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'null' => TRUE
                        ),
                        'nivel_educacion_id' => array(
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
                $this->dbforge->create_table('formaciones_academicas');
                $this->dbforge->add_column('formaciones_academicas', ['CONSTRAINT fk_id_tipos_formaciones FOREIGN KEY(nivel_educacion_id) REFERENCES smp_hv_niveles_educacion(id)']);
                $this->dbforge->add_column('formaciones_academicas', ['CONSTRAINT fk_id_personas FOREIGN KEY(persona_id) REFERENCES smp_hv_candidates(id)']);
        }

        public function down()
        {
                $this->dbforge->drop_table('formaciones_academicas');
        }
}