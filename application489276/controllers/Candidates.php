<?php
/*
 * Controlador con la logica para el modulo de candidatos
*/
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Candidates extends Base_Controller {

	Public function __construct()
	{
		parent::__construct();
		$this->load->model( 'Candidates_model' );
		$this->load->model( 'Administrator_model' );
		$this->load->model( 'Tipos_documentos_model' );
	}
	/*
	* Funciones pertenecientes al modulo de registro de usuarios
	*/

	// Función para renderizar la vista de registro de candidatos
	public function candidate_register_render ()
	{
		$estados_civiles = $this->load->model( 'Estados_civiles_model' );
		$lista_estados_civiles = $this->Estados_civiles_model->get_estados_civiles();
		$lista_tipos_documentos = $this->Tipos_documentos_model->get_tipos_documentos();
		$niveles_educacion = $this->load->model( 'niveles_educacion_model' );
		$lista_niveles_educacion = $this->niveles_educacion_model->get_niveles_educacion();
		$this->load->view( 'header.php', ['title' => 'Registro candidatos'] );
		$this->load->view( 'messages.php' );
		$this->load->view( 'candidates/candidate_register_render', ['estados_civiles' => $lista_estados_civiles,
			'tipos_documentos' => $lista_tipos_documentos,
			'niveles_educacion' => $lista_niveles_educacion] );
		$this->load->view( 'footer.php' );
	}
	public function session_active ()
	{
		if($this->session->role != 'candidate'){
			$this->session->set_flashdata('danger', 'Acceso no permitido, debe iniciar sesión primero');
			redirect('/');
		}
	}
	// Función para almacenar la información del formulario de registro de candidatos en la base de datos con validaciones
	public function candidate_store ()
	{
		$data = $this->input->post();
		$this->register_validations();
		$this->form_validation->set_rules( 'correo_electronico', 'Correo Electronico', 'required|valid_email|is_unique[smp_hv_candidates.correo_electronico]',
			array(
                    'is_unique'  => 'El correo electronico ingresado ya existe en la base de datos',
                )
		);
		$this->form_validation->set_rules( 'numero_documento', 'Número de documento',
				'required|numeric|max_length[30]|min_length[3]|greater_than[0]|is_unique[smp_hv_candidates.numero_documento]',
			array(
                    'is_unique'  => 'El número de documento ingresado ya existe en la base de datos',
                )
		);

       	// Inserción de campos en la base de datos
       	if ($this->form_validation->run() == FALSE) {
       		$mensaje = array (
       			'nombre_candidato' => form_error( 'nombre_candidato' ),
       			'edad' => form_error( 'edad'),
       			'tipo_documento' => form_error( 'tipo_documento' ),
       			'numero_documento' => form_error( 'numero_documento' ),
       			'correo_electronico' => form_error( 'correo_electronico' ),
       			'telefono' => form_error( 'telefono'),
       			'direccion_residencia' => form_error( 'direccion_residencia' ),
       			'fecha_nacimiento' => form_error( 'fecha_nacimiento' ),
       			'estado_civil' => form_error( 'estado_civil' ),
       			'lugar_nacimiento' => form_error( 'lugar_nacimiento' ),
       			'contrasena' => form_error( 'contrasena' ),
       			'confirmar_contrasena' => form_error( 'confirmar_contrasena' ),
       			'declaracion_privacidad' => form_error( 'declaracion_privacidad' ),
       			'niveles_educacion' => form_error( 'niveles_educacion[]' ),
       			'upload_file' => form_error( 'upload_file' ),
       			);
       	}else{
       		$contrasena = $this->input->post( 'contrasena' );
       		$hash = $this->bcrypt->hash_password( $contrasena );
       		$file = $_FILES['upload_file']['name'];
       		$this->Candidates_model->insert( $data, $hash, $file);
       		$mensaje = array (
       			'estado' => 1,
       			);
	        	$this->email_candidate($data);
       	}
        // Respuesta en formato Json para llamado en Ajax
        echo json_encode( $mensaje );
	}

	public function register_validations() {
		// Validaciones del formulario de creación de candidatos
		$this->form_validation->set_rules( 'upload_file', 'Archivo', 'callback_file_upload' );
		$this->form_validation->set_rules( 'nombre_candidato', 'Nombre del candidato', 'required|max_length[250]|min_length[5]' );
		$this->form_validation->set_rules( 'edad', 'Edad', 'required|numeric|max_length[3]|greater_than[0]' );
		$this->form_validation->set_rules( 'tipo_documento', 'Tipo de documento', 'required|numeric|greater_than[0]|less_than[5]',
			array(
                    'greater_than'  => 'Debe seleccionar alguna de las opciones',
                    'less_than'  => 'La opcion seleccionada no es valida'
                )
		);
		$this->form_validation->set_rules( 'telefono', 'Teléfono Movil y/o Fijo', 'required|numeric|min_length[7]|max_length[20]|greater_than[0]' );
		$this->form_validation->set_rules( 'direccion_residencia', 'Dirección residencia actual', 'required|max_length[250]|min_length[5]' );
		$this->form_validation->set_rules( 'estado_civil', 'Estado Civil', 'required|numeric|greater_than[0]|less_than[5]',
			array(
                    'greater_than'  => 'Debe seleccionar alguna de las opciones',
                    'less_than'  => 'La opcion seleccionada no es valida'
                )
			);
		$this->form_validation->set_rules( 'fecha_nacimiento', 'Fecha Nacimiento', 'required' );
       	$this->form_validation->set_rules( 'lugar_nacimiento', 'Lugar Nacimiento', 'required|max_length[250]|min_length[4]' );
       	$this->form_validation->set_rules( 'contrasena', 'Contraseña', 'required|min_length[8]|matches[confirmar_contrasena]' );
       	$this->form_validation->set_rules( 'confirmar_contrasena', 'Confirmar contraseña', 'required' );
       	$this->form_validation->set_rules( 'declaracion_privacidad', 'Declaracion Privacidad', 'required|less_than_equal_to[1]',
			array(
                    'required'  => 'Debe aceptar la declaración de privacidad',
                    'less_than_equal_to' => 'La opcion seleccionada no es valida'
                )
		);
	}

	// Función callback validación de la función candidate_store(upload_file)
	public function file_upload ()
	{
		if ( $_FILES['upload_file']['size'] != 0 ){
			$config = array(
				'upload_path' 	=> './uploads/',
				'allowed_types'	=> 'pdf|docx|doc',
				'max_size'		=> '2000'
				);
			$this->load->library( 'upload', $config );
			if ( !$this->upload->do_upload( 'upload_file' ) ){
				$this->form_validation->set_message( 'file_upload', $this->upload->display_errors( '','' ) );
				return false;
			} else {
				$this->upload_data['file'] =  $this->upload->data();
				return true;
			}	
		}
	}

	// Función para el envio de correos electronicos a admin cuando se es creado un nuevo candidato
	public function email_candidate ( $candidate )
	{
		$parametrizacion = $this->Administrator_model->getInfoProcess(1);		
		//cargamos la configuración para enviar con gmail
		$config = array(
			'useragent' => "CodeIgniter",
			'protocol' => $parametrizacion->protocolo,
			'smtp_host' => $parametrizacion->host,
			'smtp_port' => $parametrizacion->puerto,
			'smtp_user' => $parametrizacion->correo_remitente,
			'smtp_pass' => 'chelsea06**',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		);    
 
		$this->email->initialize ($config );
		$this->email->from( $parametrizacion->correo_remitente, $parametrizacion->nombre_remitente );
		$this->email->to( $parametrizacion->correo_receptor );
		$this->email->cc( $parametrizacion->copia_receptor );
		$this->email->subject( $parametrizacion->asunto.' - '.$candidate['nombre_candidato'] );
		$this->email->message( $this->load->view( 'emails/mail_candidate_admin.php',
		 	['nombre' => $candidate['nombre_candidato']], TRUE )  );
		$this->email->send();
	}

	/*
	* Funciones pertenecientes al modulo de actualización de usuarios
	*/

	// Función para renderizar la vista de actualización de candidatos
	public function candidate_register_render_update ($id)
	{
		$this->session_active();
		$candidate_detail = $this->Administrator_model->getCandidatesDetail($id);
		$candidate_experiencia = $this->Administrator_model->getCandidatesDetailExperience($id);
		$candidate_formacion = $this->Administrator_model->getCandidatesDetailFormacion($id);
		$estados_civiles = $this->load->model( 'Estados_civiles_model' );
		$lista_estados_civiles = $this->Estados_civiles_model->get_estados_civiles();
		$lista_tipos_documentos = $this->Tipos_documentos_model->get_tipos_documentos();
		$niveles_educacion = $this->load->model( 'niveles_educacion_model' );
		$lista_niveles_educacion = $this->niveles_educacion_model->get_niveles_educacion();
		$this->load->view( 'header.php', ['title' => 'Actualización candidato'] );
		$this->load->view( 'messages.php' );
		$this->load->view( 'candidates/candidate_register_render_update', ['estados_civiles' => $lista_estados_civiles,
			'tipos_documentos' => $lista_tipos_documentos,
			'niveles_educacion' => $lista_niveles_educacion,
			'candidate_detail' => $candidate_detail,
			'candidate_experiencia' => $candidate_experiencia,
			'candidate_formacion' => $candidate_formacion] );
		$this->load->view( 'footer.php' );
	}

	public function candidate_update ($id)
	{
		$data = $this->input->post();
		$this->register_validations();
		$this->form_validation->set_rules( 'correo_electronico', 'Correo Electronico', 'required|valid_email',
			array(
                    'is_unique'  => 'El correo electronico ingresado ya existe en la base de datos',
                )
		);
		$this->form_validation->set_rules( 'numero_documento', 'Número de documento',
				'required|numeric|max_length[30]|min_length[3]|greater_than[0]',
			array(
                    'is_unique'  => 'El número de documento ingresado ya existe en la base de datos',
                )
		);
       	// Inserción de campos en la base de datos
       	if ($this->form_validation->run() == FALSE) {
       		$mensaje = array (
       			'nombre_candidato' => form_error( 'nombre_candidato' ),
       			'edad' => form_error( 'edad'),
       			'tipo_documento' => form_error( 'tipo_documento' ),
       			'numero_documento' => form_error( 'numero_documento' ),
       			'correo_electronico' => form_error( 'correo_electronico' ),
       			'telefono' => form_error( 'telefono'),
       			'direccion_residencia' => form_error( 'direccion_residencia' ),
       			'fecha_nacimiento' => form_error( 'fecha_nacimiento' ),
       			'estado_civil' => form_error( 'estado_civil' ),
       			'lugar_nacimiento' => form_error( 'lugar_nacimiento' ),
       			'contrasena' => form_error( 'contrasena' ),
       			'confirmar_contrasena' => form_error( 'confirmar_contrasena' ),
       			'declaracion_privacidad' => form_error( 'declaracion_privacidad' ),
       			'niveles_educacion' => form_error( 'niveles_educacion[]' ),
       			'upload_file' => form_error( 'upload_file' ),
       			);
       	}else{
       		$contrasena = $this->input->post( 'contrasena' );
       		$hash = $this->bcrypt->hash_password( $contrasena );
       		$file = $_FILES['upload_file']['name'];
       		$this->Candidates_model->udpate( $data, $hash, $file, $id);
       		$mensaje = array (
       			'estado' => 1,
       		);
	        $this->email_candidate($data);
       	}
        // Respuesta en formato Json para llamado en Ajax
        echo json_encode( $mensaje );
	}

	/*
	* Funciones pertenecientes al modulo de loggin de usuarios
	*/

	// Función para renderizar vista formulario loggin de candidatos
	public function candidate_loggin_render ()
	{
		$lista_tipos_documentos = $this->Tipos_documentos_model->get_tipos_documentos();
		$this->load->view( 'header.php', ['title' => 'Loggin Candidatos'] );
		$this->load->view( 'messages.php' );
		$this->load->view( 'candidates/candidate_loggin_render', ['tipos_documentos' => $lista_tipos_documentos] );
		$this->load->view( 'footer.php' );
	}

	// Función para logica de validación formulario candidate_loggin_render()
	public function candidate_validate ()
	{
		$this->form_validation->set_rules( 'numero_documento', 'Numero Documento', 'callback_documento_user_check['.$this->input->post( 'tipo_documento' ).']' );
		$this->form_validation->set_rules( 'contrasena', 'Contraseña', 'callback_password_user_check['.$this->input->post( 'numero_documento').']' );
		if ( $this->form_validation->run() == FALSE ) {
            return $this->candidate_loggin_render();
        }else{
			$id_candidate = $this->Candidates_model->find( $this->input->post( 'numero_documento'), $this->input->post( 'tipo_documento' ) );
        	$this->session_usuarios( $id_candidate->id );
			$this->Administrator_model->logSystem( 'Ingreso actualización hoja de vida', $this->session->id, 1);
        	$this->session->set_flashdata('success', 'Candidato encontrado en la base de datos, puede actualizar sus datos');
        	redirect( 'candidatos/actualizar/'.$id_candidate->id );
        }
	}

	public function session_usuarios ($id) {
		$userdata = array(
	        'id'  => $id,
	        'role' => 'candidate'
		);
		$this->session->set_userdata($userdata);
	}

	// Función callback validación de la función candidate_validate(numero_documento)
	public function documento_user_check ( $documento_form, $tipo_documento )
	{
		$numero_documento = $this->Candidates_model->find( $documento_form, $tipo_documento );
		if ( !empty( $numero_documento ) ) {
			return TRUE;
		}else {
			$this->form_validation->set_message( 'documento_user_check', 'El usuario no se encuentra creado en la base de datos' );
			return FALSE;
		}
	}		

	// Función callback validación de la función candidate_validate(contrasena)
	public function password_user_check ( $password_form, $numero_documento_form )
	{
		$password = $this->Candidates_model->findPassword( $numero_documento_form );
		if ( $password ) {
			if ( $this->bcrypt->check_password( $password_form, $password->password ) ) {
				return TRUE;
			} else {
				$this->form_validation->set_message( 'password_user_check', 'El password ingresado es incorrecto' );
				return FALSE;
			}
		}
	}

	/*
	 * Funciones pertenecientes al modulo que valida si el usuario existe o no en el sistema
	*/

	// Función para renderizar formulario de validación de existencia de usuario en el sistema
	public function candidate_form_validation_render ()
	{
		$lista_tipos_documentos = $this->Tipos_documentos_model->get_tipos_documentos();
		$this->load->view( 'header.php', ['title' => 'Validar Usuario']  );
		$this->load->view( 'messages.php' );
		$this->load->view( 'candidates/candidate_form_validation_render', ['tipos_documentos' => $lista_tipos_documentos] );
		$this->load->view( 'footer.php' );
	}

	// Función para logica de validación formulario candidate_form_validation_render()
	public function document_validate ()
	{
		$this->form_validation->set_rules( 'numero_documento', 'Numero Documento', 'callback_documento_user_index_check['.$this->input->post('tipo_documento').']' );
		if ( $this->form_validation->run() == FALSE ) {
			$this->session->set_flashdata('success', 'El usuario ya se encuentra creado en nuestro sistema, por favor ingrese con sus datos');
            redirect( '/' );
        } else {
        	$this->session->set_flashdata('success', 'No has creado tu hoja de vida en nuestro sistema, en el siguiente formulario podras realizarlo');
        	redirect( 'candidatos/registrar' );
        }
	}

	// callback validación de la función document_validate(numero_documento)
	public function documento_user_index_check ( $documento_form, $tipo_documento )
	{
		$numero_documento = $this->Candidates_model->find( $documento_form, $tipo_documento );
		if ( empty( $numero_documento ) ) {
			return TRUE;
		} else {
			$this->form_validation->set_message( 'documento_user_index_check', 'El usuario ya se encuentra creado en nuestro sistema, por favor ingrese con sus datos' );
			return FALSE;
		}
	}		

	/*
	 * Funciones pertenecientes al modulo de recuperación de contraseña
	*/

	//Función para renderizar formulario de validación de recuperación de contraseña
	public function candidate_recover_password () 
	{
		$lista_tipos_documentos = $this->Tipos_documentos_model->get_tipos_documentos();
		$this->load->view( 'header.php', ['title' => 'Recuperar Contraseña']  );
		$this->load->view( 'messages.php' );
		$this->load->view( 'candidates/candidate_recover_password', ['tipos_documentos' => $lista_tipos_documentos] );
		$this->load->view( 'footer.php' );
	}

	//Función logica formulario candidate_recover_password() validar si se envia cambio de contraseña
	public function validate_user_db_recover ()
	{
		$this->form_validation->set_rules( 'numero_documento', 'Numero Documento', 'callback_documento_user_check['.$this->input->post( 'tipo_documento' ).']' );
		if ($this->form_validation->run() == FALSE) {
			return $this->candidate_recover_password();
		} else {
			$datos_recover = $this->Candidates_model->find( $this->input->post( 'numero_documento' ), $this->input->post( 'tipo_documento' ) );
			$this->recover_password_email( $datos_recover );
		}
	}
	
	// Función para renderizar formulario para el cambio de contraseña
	public function candidate_change_password_render ( $user_id ) 
	{
		$this->load->view( 'header.php', ['title' => 'Cambio de contraseña']  );
		$this->load->view( 'messages.php' );
		$this->load->view( 'candidates/candidate_change_password_render', ['user_id' => $user_id] );
		$this->load->view( 'footer.php' );
	}

	
	//Función logica cambio de contraseña de usuario
	public function change_password ()
	{
		//Validaciones del formulario
		$this->form_validation->set_rules( 'contrasena', 'Nueva Contraseña', 'required|min_length[8]|matches[confirmar_contrasena]' );
       	$this->form_validation->set_rules( 'confirmar_contrasena', 'Confirmar contraseña', 'required' );
       	$this->form_validation->set_rules( 'token', 'Token', 'callback_token_validation_check['.$this->input->post( 'user_id' ).']' );
       	if ( $this->form_validation->run() == FALSE ) {
            return $this->candidate_change_password_render( $this->input->post( 'user_id' ) );
        }else{
        	$contrasena = $this->input->post( 'contrasena' );
        	$hash = $this->bcrypt->hash_password( $contrasena );
        	$this->Candidates_model->updatePassword($this->input->post( 'user_id' ), $hash);
			$this->Administrator_model->logSystem( 'Cambio de contraseña exitoso', $this->session->id, 4);
        	$this->session->set_flashdata('success', 'La contraseña fue cambiada exitosamente, puede ingresar al sistema');
            redirect( '/' );
        }
	}

	// callback validación de la función change_password(Token)
	public function token_validation_check ( $token, $user_id )
	{
		$result = $this->Candidates_model->findToken( $token, $user_id );
		if ( !empty( $result ) ) {
			return TRUE;
		}else {
			$this->form_validation->set_message( 'token_validation_check', 'El token no concide con el enviado a su correo electronico' );
			return FALSE;
		}
	}

	//Función para el envio de correos para cambio de contraseña
	public function recover_password_email ( $datos_recover )
	{
		$token = $this->Candidates_model->changePasswordStorage( $datos_recover->id );
		$parametrizacion = $this->Administrator_model->getInfoProcess( 2 );
		$this->session_usuarios( $datos_recover->id );
		$this->Administrator_model->logSystem( 'Solicitud restauración contraseña', $this->session->id, 4);
		
		//cargamos la configuración para enviar con gmail
		$config = array(
			'useragent' => "CodeIgniter",
			'protocol' => $parametrizacion->protocolo,
			'smtp_host' => $parametrizacion->host,
			'smtp_port' => $parametrizacion->puerto,
			'smtp_user' => $parametrizacion->correo_remitente,
			'smtp_pass' => 'chelsea06**',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		);    
 
		$this->email->initialize( $config );
		$this->email->from( $parametrizacion->correo_remitente, $parametrizacion->nombre_remitente );
		$this->email->to( $datos_recover->correo_electronico );
		$this->email->subject( $parametrizacion->asunto );
		$this->email->message( $this->load->view( 'emails/mail_recover_password.php', ['nombre' => $datos_recover->nombre_completo, 'token' => $token ], TRUE ) );
		$this->email->send();
		//var_dump($this->email->print_debugger());
		$this->session->set_flashdata('success', 'Un correo con una clave temporal fue enviada a tu correo, la cual debera ser ingresada en el siguiente formulario');
		redirect( 'candidatos/cambiopassword/'.$datos_recover->id );
	}

	
}
