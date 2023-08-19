<?php
    session_start();
    
    session_destroy();
    //Redireccionamos al login de nuevo
    echo '<script>window.location="../../../index.php"</script>';