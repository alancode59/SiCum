<?php
    //Incluir el archivo de conexión
    include './conexion.php';

    //Importar la libreria de variables de sesion
    session_start();

    //Declaración de variables para alamacenar los datos
    $empleado = $_POST['email'];
    $password = $_POST['password'];
    //$estatus_usuario = $_POST['estatus_usuario'];

    //Valida si mis variables no esán vacias
    if(empty($empleado) || empty($password)){
        echo 'Tu información de usuario está vacia.';
    }//end if empty
    else{
        //Query para verificar si existe el usuario
        //$query_text = 'SELECT * FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol  WHERE email_usuario="'.$usuario.'" AND password_usuario = "'.$password.'";';
        $query_text = 'SELECT * FROM empleados INNER JOIN roles ON empleados.id_rol = roles.id_rol  WHERE email_empleado="'.$empleado.'" AND password_empleado = SHA2("'.$password.'",0);';
        //$query_mosusu = 'SELECT '$estatus_usuario' from usuarios where id_usuario ="'$usuario'";';
        //echo $query_text;

        //Creamos la consulta con el query
        $query_res = mysqli_query($conexion, $query_text);
        //$query_esta = mysqli_query($conexion,  $query_mosusu)

        //Mostramos en pantalla la información de la peticion como prueba
        //print("<pre>".print_r($query_res, true)."</pre>");

        if(mysqli_num_rows($query_res) == 0){
            //Muestra una alerta
            echo '<script>alert("Usuario del empleado y/o contraseña incorrectos")</script>';
            //Destruimos la sesion
            session_destroy();
            //Redireccionamos al login de nuevo
            echo '<script>
                 window.location="../../../index.php";
            </script>';
        }//end if mysqli_num_rows
        else{
            //Se obtienen los datos y se meten en un arreglo asociativo
            $datos = mysqli_fetch_array($query_res, MYSQLI_ASSOC);                            
            if($datos['estatus_empleado'] != 1){
                echo '<script>
                    alert("Su empleado esta inactivo :(");
                 window.location="../../../index.php";
                </script>';
            }else{
                            //Muestra los datos 
            //print("<pre>".print_r($datos, true)."</pre>");

            //Se crea el archivo de sesiones
            $_SESSION['id_empleado'] = $datos['id_empleado'];
            $_SESSION['nombre_empleado'] = $datos['nombre_empleado'];
            $_SESSION['nombre_completo'] = $datos['nombre_empleado'].' '.$datos['ap_paterno_empleado'].' '.$datos['ap_materno_empleado'];
            $_SESSION['imagen_perfil'] = ($datos['imagen_empleado'] == NULL) ? '../img/icono-empleado.png' : '../img/'.$datos['imagen_empleado'];
            $_SESSION['id_rol'] = $datos['id_rol'];
            $_SESSION['rol'] = $datos['rol'];

            //print("<pre>".print_r($_SESSION, true)."</pre>");

            //Se libera el objeto de datos asociativo
            mysqli_free_result($query_res);

            //Se cierra la conexion
            mysqli_close($conexion);

            //Se redirecciona a un lugar
            echo '<script>window.location="../../pages/dashboard.php"</script>';

            }
        }
    }//end else