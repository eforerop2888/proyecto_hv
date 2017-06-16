<?php 
$config = array(
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
    ),
    'change_password' => array(
        array(
            'field' => 'token',
            'label' => 'Token',
            'rules' => 'required'
        ),
        array(
            'field' => 'contrasena',
            'label' => 'Nueva Contraseña',
            'rules' => 'required|min_length[8]|matches[confirmar_contrasena]'
        ),
        array(
            'field' => 'confirmar_contrasena',
            'label' => 'Confirmar Contraseña',
            'rules' => 'required'
        )
    )
);
$config['error_prefix'] = '';
$config['error_suffix'] = '';
