<?php

    /*
        UNIVERSIDAD DE CÓRDOBA
        Escuela Politécnica Superior de Córdoba
        Departamento de Electrónica

        Desarrollo de un sistema sensor IoT de gases y comunicación a base de datos mediante LoraWan
        Director(es): Jesús Rioja Bravo
        Curso 2022 - 2023
    */

    /*
        En todos los $_POST, $_GET se utilizan varios protocolos de seguridad para restringir posibles ataques malicioso de gente/bots no deseados.
        Obviando también los post-protocolos revisando si el registro existe o no.
        
        # https://www.php.net/manual/en/function.htmlspecialchars.php
        # https://www.php.net/manual/en/function.filter-var.php#
    */


    # Conexión global
    require 'inc/conn.php';

    # En caso que tenga la sesión iniciada, permitirá los siguientes formularios...
    if($_SESSION['id']){


        # Borrar registro
        if($_GET['formulario'] == 'delete'){

            $get = htmlspecialchars(filter_var($_GET['g'], FILTER_SANITIZE_STRING));

            $result = $conn->query("SELECT * FROM tfg_gases WHERE ID='$get'");
            $g = $result->fetch_array();

            if(!$g['ID']){

                echo alert('No existe', 'red');

            } else {

                mysqli_query($conn, "DELETE FROM tfg_gases WHERE ID='$_GET[g]'");
                echo href($url . '/home.php', 0);

            }

        }

        # Editar registro
        if($_GET['formulario'] == 'modify'){

            $get = htmlspecialchars(filter_var($_GET['g'], FILTER_SANITIZE_STRING));
            $SN = htmlspecialchars(filter_var($_POST['SN'], FILTER_SANITIZE_STRING));
            $CO2 = htmlspecialchars(filter_var($_POST['CO2'], FILTER_SANITIZE_STRING));
            $NH3 = htmlspecialchars(filter_var($_POST['NH3'], FILTER_SANITIZE_STRING));
            $humedad = htmlspecialchars(filter_var($_POST['humedad'], FILTER_SANITIZE_STRING));
            $presion = htmlspecialchars(filter_var($_POST['presion'], FILTER_SANITIZE_STRING));
            $temperatura = htmlspecialchars(filter_var($_POST['temperatura'], FILTER_SANITIZE_STRING));
            $altitud = htmlspecialchars(filter_var($_POST['altitud'], FILTER_SANITIZE_STRING));
            $ITH = htmlspecialchars(filter_var($_POST['ITH'], FILTER_SANITIZE_STRING));

            $result = $conn->query("SELECT * FROM tfg_gases WHERE ID='$get'");
            $g = $result->fetch_array();

            if(!$g['ID']){

                echo alert('No existe', 'red');

            } else {

                mysqli_query($conn, "UPDATE tfg_gases SET SN='$SN', CO2='$CO2', NH3='$NH3', humedad='$humedad', presion='$presion', temperatura='$temperatura', altitud='$altitud', ITH='$ITH' WHERE ID='$g[ID]'");
                echo alert('Cambios guardados', 'green');
                echo href($url . '/ino.php?id=' . $g['ID'], '2000');

            }

        }


    } else {

        if($_GET['formulario'] == 'login'){
            
            $usuario = htmlspecialchars(filter_var($_POST['usuario'], FILTER_SANITIZE_STRING));
            $password = htmlspecialchars(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

            $result_user = $conn->query("SELECT * FROM admin WHERE usuario='$usuario'");$userresult = $result_user->fetch_array();

            if(empty($usuario) && empty($password)){

                echo alert('Faltan campos por rellenar', 'red');

            } elseif($result_user->num_rows <= 0){

                echo alert('Usuario erróneo', 'red');

            } elseif(md5($password) == $userresult['password']){
                
                echo alert('Iniciando sesión...', 'green');
                $_SESSION['id'] = $userresult['ID'];
                echo href($url . '/home.php', '1000');

            } else {
                echo alert('Contraseña errónea', 'red');
            }

        }


    }

?>