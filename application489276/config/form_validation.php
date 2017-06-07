<?php 
$config = array(
    'candidate_store' => array(
        array(
            'field' => 'nombre_candidato',
            'label' => 'Nombre del candidato',
            'rules' => 'required'
        ),
        array(
            'field' => 'edad',
            'label' => 'Edad',
            'rules' => 'required|numeric'
        ),
        array(
            'field' => 'tipo_documento',
            'label' => 'Tipo de documento',
            'rules' => 'required|numeric|greater_than[0]|less_than[4]'
        ),
        array(
            'field' => 'numero_documento',
            'label' => 'Número de documento',
            'rules' => 'required|numeric'
        ),
        array(
            'field' => 'numero_documento',
            'label' => 'Número de documento',
            'rules' => 'required|numeric'
        ),
         array(
            'field' => 'correo_electronico',
            'label' => 'Correo Electronico',
            'rules' => 'required|regex_match[/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i]'
        )
    )
);