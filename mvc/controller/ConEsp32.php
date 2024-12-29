<?php 

    include '../model/ModelEsp32.php';

    $luz= new luz();

    ////// valida si el token es correcto ////////////////////////////

    $luz->token = $_GET["token"];

    $datosDevolver = $luz->validarToken();

    if($datosDevolver <> 1){
        die('{ "res": "Token Invalido" }');
    }

    //////////////////////////


    if(isset($_GET['dataluz'])){

        $datosDevolver = $luz->consultarLuz();

        echo json_encode($datosDevolver);

    }

    if(isset($_GET['cambiarEstado'])){

        $luz->idluz = $_GET["id"]; 

        if($_GET['estado'] == 1){
            $luz->estado = 1; 
        }else{
            $luz->estado = 0;

        }

        $datosDevolver = $luz->cambiarEstado();
        echo '{"res": '.$datosDevolver.'}';;

        //https://esp32.jgcasociados.com.co/mvc/controller/ConEsp32?cambiarEstado&token=7WK5T79u5mIzjIXXi2oI9Fglmgivv7RAJ7izyj9tUyQ&id=l1&estado=1
        //https://esp32.jgcasociados.com.co/mvc/controller/ConEsp32?cambiarEstado&token=7WK5T79u5mIzjIXXi2oI9Fglmgivv7RAJ7izyj9tUyQ&id=l1&estado=0

    }


    if(isset($_GET['dataLuces'])){

        $datosDevolver = $luz->consultarLuces();

        echo json_encode($datosDevolver);

    }


?>