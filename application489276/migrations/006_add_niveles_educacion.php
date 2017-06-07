<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_niveles_educacion extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'tipo_formacion' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => TRUE
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('niveles_educacion');
        }

        public function down()
        {
                $this->dbforge->drop_table('niveles_educacion');
        }
}