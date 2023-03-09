<?php

    /*
        UNIVERSIDAD DE CÓRDOBA
        Escuela Politécnica Superior de Córdoba
        Departamento de Electrónica

        Desarrollo de un sistema sensor IoT de gases y comunicación a base de datos mediante LoraWan
        Director(es): Jesús Rioja Bravo
        Curso 2022 - 2023
    */

    
    # Configuración CMS
    $url = "http://127.0.0.1"; // Enlace de la web
    $name = "Arduino"; // Nombre del proyecto

    # Configuración regulable
    $settings = [
        # Valores min-max de los registros
        'arduino' => [
            'temperatura' => [
                'min' => '30',
                'max' => '48',
                'symbol' => 'ºC'
            ],
            'CO2' => [
                'min' => '400',
                'max' => '800',
                'symbol' => 'ppm'
            ],
            'NH3' => [
                'min' => '15',
                'max' => '25',
                'symbol' => 'ppm'
            ],
            'humedad' => [
                'min' => '40',
                'max' => '60',
                'symbol' => '%'
            ],
            'presion' => [
                'min' => '997.9',
                'max' => '1037.1',
                'symbol' => 'hPa'
            ],
            'altitud' => [
                'min' => '500',
                'max' => '1000',
                'symbol' => 'm'
            ],
            'ITH' => [
                'min' => '70',
                'max' => '85',
                'symbol' => ''
            ]
        ],
        # Sistema de correo electrónico
        'email' => [
            'server' => [
                'host' => '',
                'port' => '',
                'name' => $name,
                'username' => '',
                'password' => ''
            ],
            'receptor' => [
                'name' => '',
                'username' => ''
            ]
        ]
    ];
    

?>