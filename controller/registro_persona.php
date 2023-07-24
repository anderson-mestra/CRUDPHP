<?php
include 'model/conexion.php';


if (!empty($_POST["btnRegistrar"])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST["cedula"];
    $correo = $_POST["correo"];
    if (!empty($nombre) and !empty($apellido) and !empty($cedula) and !empty($correo)) {

        $sql = $conexion->query(" insert into estudiante (nombre, apellido, cedula, correo, fechaIngreso) values ('$nombre', '$apellido', '$cedula', '$correo', curdate())"); //Insercion de informacion a la tabla
        $cedularesp = $conexion->query("select * from estudiante where cedula=$cedula");

        if ($sql == 1) {
            echo '<div class="alert alert-success">Se ha registrado correctamente</div>';
        } elseif ($cedularesp == true) {
            echo '<div class="alert alert-danger">El documento ya esta registrado</div>';
        } else {
            echo '<div class="alert alert-danger">No se ha podido registrar</div>';
        }
    } else
        echo '<div class="alert alert-danger">Hay campos vacios</div>';
}
