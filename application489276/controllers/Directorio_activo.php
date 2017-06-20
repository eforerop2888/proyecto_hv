<?php
/*
 * Controlador con la logica para el modulo de candidatos
*/
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Directorio_activo extends Base_Controller {

	public function index() {
		$conectado_LDAP = ldap_connect("ldap://192.168.0.20/", 389) or
           die("Couldn't connect to AD!");

        ldap_set_option($conectado_LDAP, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($conectado_LDAP, LDAP_OPT_REFERRALS, 0);

        if ($conectado_LDAP) 
  		{
    		echo "<br>Conectado correctamente al servidor LDAP ";
		}

		$autenticado_LDAP = @ldap_bind($conectado_LDAP, "eforero" . "@" . "ldap://192.168.0.20/", "Dmabog39*");
	    if ($autenticado_LDAP)
	    {
		    echo "<br>Autenticación en servidor LDAP desde Apache y PHP correcta.";
		}else{
	      echo "<br>verifique el usuario y la contraseña introducidos<br>";
	      echo ldap_error($conectado_LDAP);
	      echo ldap_errno($conectado_LDAP);
	    }
	}

}

/*$g_ldap_protocol_version = 3;
$g_ldap_server = 'ldap://192.168.0.20/';
$g_ldap_port = '389';
$g_ldap_root_dn = 'OU=SIMPLE,DC=SIMPLE,DC=local';
//$g_ldap_organization = '(memberOf=CN=S3,OU=Grupos,OU=SIMPLE,DC=SIMPLE,DC=local)';
$g_ldap_organization = '';
$g_ldap_uid_field = 'sAMAccountName';
$g_ldap_bind_dn = 'mantis';   # A system account to login to LDAP
$g_ldap_bind_passwd = 'Simple2010';         # System account password
$g_ldap_realname_field = "name";*/