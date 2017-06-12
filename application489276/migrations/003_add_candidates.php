<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_candidates extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'nombre_completo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => TRUE
                        ),
                        'edad' => array(
                                'type' => 'INT',
                                'constraint' => 20, 
                                'null' => TRUE
                        ),
                        'tipo_documento_id' => array(
                                'type' => 'INT',
                                'constraint' => 20,
                                'null' => TRUE
                        ),
                        'numero_documento' => array(
                                'type' => 'BIGINT',
                                'constraint' => 20,
                                'null' => TRUE
                        ),
                        'correo_electronico' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => TRUE
                        ),
                        'telefono' => array(
                                'type' => 'BIGINT',
                                'constraint' => 20,
                                'null' => TRUE
                        ),
                        'direccion_residencia' => array(
                                'type' => 'TEXT',
                                'null' => TRUE
                        ),
                        'estado_civil_id' => array(
                                'type' => 'INT',
                                'constraint' => 20,
                                'null' => TRUE
                        ),
                        'fecha_nacimiento' => array(
                                'type' => 'TIMESTAMP',
                                'null' => TRUE
                        ),
                        'lugar_nacimiento' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => TRUE
                        ),
                        'password' => array(
                                'type' => 'TEXT',
                                'null' => TRUE
                        ),
                        'declaracion_privacidad' => array(
                                'type' => 'INT',
                                'constraint' => 20,
                                'default' => 0,
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('candidates');
                $this->dbforge->add_column('candidates', ['CONSTRAINT fk_id_estado_civil FOREIGN KEY(estado_civil_id) REFERENCES smp_hv_estados_civiles(id)']);
                $this->dbforge->add_column('candidates', ['CONSTRAINT fk_id_estado_tipos_documentos FOREIGN KEY(tipo_documento_id) REFERENCES smp_hv_tipos_documentos(id)']);
        }

        public function down()
        {
                $this->dbforge->drop_table('candidates');
        }
}