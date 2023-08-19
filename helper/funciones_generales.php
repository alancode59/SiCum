<?php
    //Constante para tomar la carpeta de recursos del portal
    $root_path_portal = './portal/recursos/';
    $root_specific_portal = '../recursos/';

    //Constante para tomar la carpeta de usuario
    $root_specific_user = '../user/resource/';

    //Constante para tomar la carpeta de recursos pane
    $root_specific_panel = '../resources/';

    //Constante para la imagen del perfil
    $path_img_panel = '../img/';


    function path_image($folder = '', $img = ''){
        //$identificador = (condition) ? 'has esto - action a' : 'si no action b' ;
        $path = ($folder != "") ? '../img/'. $img : './portal/img/' . $img;
        return (file_exists($path) ? $path : ($folder != "" ? '../img/no-image.png' : './portal/img/no-image.png'));
    }//end path_image
