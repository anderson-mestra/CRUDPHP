
<?php

if (!empty($_POST["btnRegistrar"])) {
    if(!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["cedula"]) and !empty($_POST["correo"]))
        echo 'Success!';
    }else{
        echo 'Hay campos vacios';
    }
    

?>