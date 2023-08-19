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

    //Obtenemos el id desde el URL por el método GET
    $id_empleado = $_GET["id_empleado"];//se obtiene el id
    $estatus = $_GET["estatus"];

    //Verificamos si la variable no esta vacia
    if(empty($id_empleado) || empty($estatus)){
        echo '<script>
                alert("Error, los datos necesarios para procesar está consulta están vacios...");
                window.location = "./empleados.php";
                </script>';
    }//end empty
    else{
        //Otenemos la información del formulario a buscar
        $query_select = "SELECT * FROM empleados WHERE id_empleado=$id_empleado;";
        echo $query_select;

        //Procesamos la petición a la BD
        $query_res_select = mysqli_query($conexion, $query_select);

        //Procesamos la información a un arreglo asociativo
        $empleado = mysqli_fetch_array($query_res_select, MYSQLI_ASSOC);

        ///Mostramos el arrelo de la peticion
        // print("<pre>".print_r($usuario,true)."</pre>");

        //Validamos si ese usuario realmente exite
        if(sizeof($empleado) > 0){
            //=========================
            // Proceso para Actualizar
            // 1 -> Habilitado
            // 2 -> Deshabilitado
            //==========================
            // echo $estatus;
            $set_estatus = ($estatus == 2) ? 1 : 2;
            // echo '<br>'.$set_estatus;

            $query_update = "UPDATE empleados SET estatus_empleado = $set_estatus WHERE id_empleado=$id_empleado;";
            // echo $query_update;

            //Hace el proceso de petición a la BD
            $query_res_update = mysqli_query($conexion, $query_update);
            // echo $query_res_update;

            if(!$query_res_update){
                echo '<script>alert("Error al cambiar el estatus de este empleado. Falló nuestro servidor, intente nuevamente, por favor.");</script>';
            }//end if falló la actualización
            else{
                echo '<script>alert("¡El estatus ha sido actualizado para este empleado de manera correcta!");</script>';
            }//end else falló la actualización
        }//end sizeof true
        else{
            //Se manda el error en caso contrario
            echo '<script>alert("Error al cambiar el estatus de este empleado. El empleado no existe, intentelo de nuevo, por favor.");</script>';
        }//end else zizeof

        //Se cierra la conexión
        mysqli_close($conexion);
        
        //Se redirecciona a la pagina de todo los usuarios
        echo '<script> window.location = "../../../pages/empleados.php";</script>';
    }//end else empty
