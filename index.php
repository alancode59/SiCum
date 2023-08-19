<?php
  require('./helper/funciones_generales.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi cuenta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="./user/resource/css/style.css" rel="stylesheet"/>

        <!-- JQUERY VALIDATION -->
        <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
        <!-- TOATS -->
        <link href="./user/plugins/css/toastr.min.css" rel="stylesheet"/>


</head>


<div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#">
                <h1>Crear Cuenta</h1>
                <div class="social-container">
                </div>
                <span>Use su correo electrónico para registrarse</span>
                <input type="text" placeholder="Nombre" />
                <input type="email" placeholder="Correo Electrónico"/>
                <input type="password" placeholder="Password" />
                <button><a href="../index.php">Registrarse</a></button>
            </form>
        </div>
        <div class="form-container log-in-container">
            <form action="./panel/backend/admin/validar_usuario.php" method="post" class="signin-form" id="formulario-login">
                <h1>Iniciar Sesión</h1>
                <div class="social-container">
                </div>
                <span></span>
                <input type="Email" placeholder="Email" id="email" name="email"  required/>
                <input type="password"  id="password"  name="password" placeholder="password" required />
                <a href="#">¿Olvidaste tu contraseña?</a>
                <button type="submit">Registrarse</button>

            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>¡Bienvenido de nuevo!</h1>
                    <p>¿Ya tienes una cuenta? Iniciar sesión</p>
                    <button class="ghost" id="logIn">Iniciar Sesión</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>¡Hola Usuario!</h1>
                    <p>¿No tienes una cuenta? Regístrate gratis</p>
                    <button class="ghost" id="signUp">Registrarse</button>
                </div>
            </div>
        </div>
    </div>


    <script src="./user/resource/js/app.js"></script>


    <!-- JQUERY VALIDATION -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <!--  -->
    <script src="./user/plugins/js/toastr.min.js"></script>
    <script>
    // just for the demos, avoids form submit
    /*jQuery.validator.setDefaults({
        // debug: true,
        success: "valid"
    });
    $( "#formulario-login" ).validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
            }
        },
        messages: {
            email:{
                required: "Se requiere el correo electrónico.",
                email: 'Se requiere un correo valido.'
            },
            password:{
                required: "Se requiere la contraseña.",
            }
        }

    });*/


    

    // toastr["error"]("Inconceivable!");
    </script>




</body>

</html>