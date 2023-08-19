<?php
    //Incluir el archivo de conexión
    include '../../admin/conexion.php';

    //Instanciamos las variables de sesion
    session_start();

    //Verificamos si realmente ha iniciado sesión
    if(!isset($_SESSION['id_empleado'])){
        echo '
                <script>
                    alert("No tienes permiso para acceder a esta vista. Inicia sesión, por favor...");
                    window.location="../../../../index.php";
                </script>
            ';
    }//end if existe una sesión iniciada

    //Para almacenar la información del form registrar
    $nombre = $_POST['nombre'];
    $ap_paterno = $_POST['apellido_paterno'];
    $ap_materno = $_POST['apellido_materno'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $montomensual = $_POST['montoM'];
    $fechainicio = $_POST['fechai'];
    $fechapago = $_POST['fechap'];

    $imagen = $_FILES['foto_perfil']; 

    //Validar si las variables no estan vacias
    if( empty($nombre) || empty($ap_paterno) || empty($ap_materno) ||
        empty($sexo) || empty($email) || empty($montomensual) || empty($fechainicio) || empty($fechapago) || empty($imagen) 
        ){
        //Se cierra la conexión
		mysqli_close($conexion);
        //Se redirecciona al formulario de insertar
		echo '<script>alert("Error, hay información faltante.");</script>';
		echo '<script> window.location="../../../pages/usuario_nuevo.php"; </script>';
    }//

    //se declara una variable para referenciar al input que contiene la imagen

    //Determinamos la variable que almacenara la información de la imagen
    $nombre_archivo = 'NULL';

    //Verificamos que no este vacia la foto del perfil 
    if(!empty($imagen["name"])){
        //se obtiene la extensión del archivo
        $temp = explode(".", $imagen["name"]);
        $extension = end($temp);

        //se verifica la extensión del archivo
        if(($extension != "jpg") && ($extension != "png")){
        	//Se cierra la conexión
        	mysqli_close($conexion);
        	echo '<script>alert("Debe subir una imagen con extensión jpg o png");</script>';
        	echo '<script> window.location="../../../pages/usuario_nuevo.php"; </script>';
        }//end if extensión no permitida

        echo $imagen['name'];
        //se sube el archivo al servidor
        if(move_uploaded_file($imagen["tmp_name"], "../../../img/".$imagen["name"])){
            $nombre_archivo = $imagen['name'];
        }//end if el archivo no pudo guardarse en

//end if el archivo no pudo guardarse en la ruta indicada del servidor

    }//!empty 


    //Se genera el sql para insertar
    $query_text = "INSERT INTO usuarios values(NULL, '$nombre', '$ap_paterno', '$ap_materno', '$sexo', '$email', $montomensual, '$fechainicio', '$fechapago', '$nombre_archivo');";
    // echo $query_text;

    //Se conecta el sql con la bd
    $query_res = mysqli_query($conexion, $query_text);

    if(!$query_res){
        //Se cierra la conexión
        mysqli_close($conexion);
        //se borra el archivo de imagen guardado en el servidor previamente
        unlink("../../../img/".$nombre_archivo);
        echo '<script>alert("Error al almacenar los datos del usuario. Consulte al administrador.");</script>';
        echo '<script> window.location="../../../pages/usuario_nuevo.php"; </script>';
    }//end if hubo un error al insertar en la base de datos
    else{
        //Se cierra la conexión
        mysqli_close($conexion);
        echo '<script>alert("Usuario registrado correctamente.");</script>';
        echo '<script> window.location="../../../pages/usuarios.php"; </script>';
    }//end else se guardaron los datos de los tennis correctamente

