<?php
/*
 * Controlador con la logica para el modulo de candidatos
*/
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Directorio_activo extends Base_Controller {

	public function index() {

	    $adServer = "ldap://192.168.0.20/";
	    $ldap = ldap_connect($adServer);
	    $username = "eforero";
	    $password = "Dmabog39*";

	    $ldaprdn = 'SIMPLE' . "\\" . $username;

	    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
	    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

	    $bind = @ldap_bind($ldap, $ldaprdn, $password);


	    if ($bind) {
	        //$filter="(&(objectCategory=person)(samaccountname=eforero)(memberOf=CN=GS_TALENTO_HUMANO))";
	        //$filter="(&(objectCategory=person)(samaccountname=eforero)(primarygroupid=513))";
	        $filter="(&(objectClass=user)(sAMAccountName=$username)(memberof=CN=GS_TALENTO_HUMANO,OU=Grupos,OU=SIMPLE,DC=SIMPLE,DC=local))";
	        $result = ldap_search($ldap,"dc=SIMPLE,dc=local",$filter);
	        ldap_sort($ldap,$result,"sn");
	        $info = ldap_get_entries($ldap, $result);
	        for ($i=0; $i<$info["count"]; $i++)
	        {
	            if($info['count'] > 1)
	            	break;
	            echo "<p>You are accessing <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] ."</strong><br /> (" . $info[$i]["samaccountname"][0] .")</p>\n";
	            echo '<pre>';
	            var_dump($info);
	            echo '</pre>';
	            $userDn = $info[$i]["distinguishedname"][0]; 
	        }
	        @ldap_close($ldap);
	    } else {
	        $msg = "Invalid email address / password";
	        echo $msg;
	    }
	}

}