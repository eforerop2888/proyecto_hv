<?php 
$config = array(
    'candidate_store' => array(
        array(
            'field' => 'nombre_candidato',
            'label' => 'Nombre del candidato',
            'rules' => 'required|max_length[250]'
        ),
        array(
            'field' => 'edad',
            'label' => 'Edad',
            'rules' => 'required|numeric'
        ),
        /*array(
            'field' => 'tipo_documento',
            'label' => 'Tipo de documento',
            'rules' => 'required|numeric|greater_than[0]|less_than[4]'
        ),*/
        array(
            'field' => 'numero_documento',
            'label' => 'Número de documento',
            'rules' => 'required|numeric'
        ),
        array(
            'field' => 'correo_electronico',
            'label' => 'Correo Electronico',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'telefono',
            'label' => 'Teléfono Movil y/o Fijo',
            'rules' => 'required|numeric|max_length[20]'
        ),
        array(
            'field' => 'direccion_residencia',
            'label' => 'Dirección residencia actual',
            'rules' => 'required|max_length[250]'
        ),
        /*array(
            'field' => 'estado_civil',
            'label' => 'Estado Civil',
            'rules' => 'required|numeric|greater_than[0]|less_than[4]'
        ),*/
        array(
            'field' => 'fecha_nacimiento',
            'label' => 'Fecha Nacimiento',
            'rules' => 'required'
        ),
        array(
            'field' => 'lugar_nacimiento',
            'label' => 'Lugar Nacimiento',
            'rules' => 'required|max_length[250]'
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
        )
    )
);
