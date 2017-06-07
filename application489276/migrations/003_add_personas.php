<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_personas extends CI_Migration {

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
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'null' => TRUE
                        ),
                        'tipo_documento_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'null' => TRUE
                        ),
                        'numero_documento' => array(
                                'type' => 'INT',
                                'constraint' => 20,
                                'null' => TRUE
                        ),
                        'correo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => TRUE
                        ),
                        'telefono' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'null' => TRUE
                        ),
                        'direccion_residencia' => array(
                                'type' => 'TEXT',
                                'null' => TRUE
                        ),
                        'estado_civil_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
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
                                'type' => 'VARCHAR',
                                'constraint' => 1,
                                'null' => TRUE
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('personas');
                $this->dbforge->add_column('personas', ['CONSTRAINT fk_id_estado_civil FOREIGN KEY(estado_civil_id) REFERENCES smp_hv_estados_civiles(id)']);
                $this->dbforge->add_column('personas', ['CONSTRAINT fk_id_estado_tipos_documentos FOREIGN KEY(tipo_documento_id) REFERENCES smp_hv_tipos_documentos(id)']);
        }

        public function down()
        {
                $this->dbforge->drop_table('personas');
        }
}