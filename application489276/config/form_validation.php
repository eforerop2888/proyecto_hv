<?php 
$config = array(
    'candidate_store' => array(
        array(
            'field' => 'nombre_candidato',
            'label' => 'Nombre del candidato',
            'rules' => 'required|max_length[250]|min_length[5]'
        ),
        array(
            'field' => 'edad',
            'label' => 'Edad',
            'rules' => 'required|numeric|max_length[3]|greater_than[0]'
        ),
        array(
            'field' => 'tipo_documento',
            'label' => 'Tipo de documento',
            'rules' => 'required|numeric|greater_than[0]|less_than[5]',
            'errors' => array(
                    'greater_than'  => 'Debe seleccionar alguna de las opciones',
                    'less_than'  => 'La opcion seleccionada no es valida'
                ),
        ),
        array(
            'field' => 'numero_documento',
            'label' => 'Número de documento',
            'rules' => 'required|numeric|max_length[30]|min_length[3]|greater_than[0]|is_unique[smp_hv_candidates.numero_documento]',
            'errors' => array(
                    'is_unique'  => 'El número de documento ingresado ya existe en la base de datos',
                ),
        ),
        array(
            'field' => 'correo_electronico',
            'label' => 'Correo Electronico',
            'rules' => 'required|valid_email|is_unique[smp_hv_candidates.correo_electronico]',
            'errors' => array(
                    'is_unique'  => 'El correo electronico ingresado ya existe en la base de datos',
                ),
        ),
        array(
            'field' => 'telefono',
            'label' => 'Teléfono Movil y/o Fijo',
            'rules' => 'required|numeric|min_length[7]|max_length[20]|greater_than[0]'
        ),
        array(
            'field' => 'direccion_residencia',
            'label' => 'Dirección residencia actual',
            'rules' => 'required|max_length[250]|min_length[5]'
        ),
        array(
            'field' => 'estado_civil',
            'label' => 'Estado Civil',
            'rules' => 'required|numeric|greater_than[0]|less_than[5]',
            'errors' => array(
                    'greater_than'  => 'Debe seleccionar alguna de las opciones',
                    'less_than'  => 'La opcion seleccionada no es valida'
                ),
        ),
        array(
            'field' => 'fecha_nacimiento',
            'label' => 'Fecha Nacimiento',
            'rules' => 'required'
        ),
        array(
            'field' => 'lugar_nacimiento',
            'label' => 'Lugar Nacimiento',
            'rules' => 'required|max_length[250]|min_length[4]'
        ),
        array(
            'field' => 'contrasena',
            'label' => 'Contraseña',
            'rules' => 'required|min_length[8]|matches[confirmar_contrasena]'
        ),
        array(
            'field' => 'confirmar_contrasena',
            'label' => 'Confirmar contraseña',
            'rules' => 'required'
        ),
        array(
            'field' => 'declaracion_privacidad',
            'label' => 'Declaracion Privacidad',
            'rules' => 'required|less_than_equal_to[1]',
            'errors' => array(
                    'required'  => 'Debe aceptar la declaración de privacidad',
                    'less_than_equal_to' => 'La opcion seleccionada no es valida'
                ),
        ),
        /*array(
            'field' => 'niveles_educacion[]',
            'label' => 'Nivel de educación',
            'rules' => 'required|numeric|greater_than[0]|less_than[5]',
            'errors' => array(
                    'greater_than' => 'Debe seleccionar algún nivel de educación',
                    'less_than'  => 'La opcion seleccionada no es valida'
                ),
        )*/
    ),
    'mail_parametrization_store' => array(
            array(
                'field' => 'protocolo',
                'label' => 'Protocolo',
                'rules' => 'required'
            ),
            array(
                'field' => 'host',
                'label' => 'Host',
                'rules' => 'required'
            ),
            array(
                'field' => 'puerto',
                'label' => 'Puerto',
                'rules' => 'required|numeric'
            ),
            array(
                'field' => 'correo_remitente',
                'label' => 'Correo remitente',
                'rules' => 'required'
            ),
            array(
                'field' => 'nombre_remitente',
                'label' => 'Nombre remitente',
                'rules' => 'required'
            ),
            array(
                'field' => 'correo_receptor',
                'label' => 'Correo destinatario',
                'rules' => 'required'
            ),
            array(
                'field' => 'copia_receptor',
                'label' => 'Copia correo destinatario',
                'rules' => 'required'
            ),
             array(
                'field' => 'asunto',
                'label' => 'Asunto',
                'rules' => 'required'
            )
        )
);
$config['error_prefix'] = '';
$config['error_suffix'] = '';
