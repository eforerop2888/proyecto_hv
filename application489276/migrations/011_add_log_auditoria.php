<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_log_auditoria extends CI_Migration {

        public function up()
        {
            $this->dbforge->add_field(array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'modulo' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',                                        
                    'null' => TRUE
                ),
                'usuario_id' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',                                        
                    'null' => TRUE
                ),
                'log_proceso_id' => array(
                    'type' => 'INT',
                    'constraint' => 11,                                        
                    'null' => TRUE
                ),
                'fecha' => array(
                    'type' => 'TIMESTAMP',
                    'null' => TRUE
                ),
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('log_auditoria');
            $this->dbforge->add_column('log_auditoria', ['CONSTRAINT fk_id_log_procesos FOREIGN KEY(log_proceso_id) REFERENCES smp_hv_log_procesos(id)']);
        }

        public function down()
        {
                $this->dbforge->drop_table('log_auditoria');
        }
}