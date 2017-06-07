<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_correos_parametrizacion extends CI_Migration {

        public function up()
        {
            $this->dbforge->add_field(array(
                'id' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'correo' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '255',                                        
                        'null' => TRUE
                ),
                'smtp' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '255',
                        'null' => TRUE
                ),
                'proceso_correo_id' => array(
                        'type' => 'INT',
                        'constraint' => 2,
                        'null' => TRUE
                )
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('correos_parametrizacion');
            $this->dbforge->add_column('correos_parametrizacion', ['CONSTRAINT fk_id_procesos_correos FOREIGN KEY(proceso_correo_id) REFERENCES smp_hv_procesos_correos(id)']);
        }

        public function down()
        {
                $this->dbforge->drop_table('correos_parametrizacion');
        }
}