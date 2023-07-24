<?php

include 'model/conexion.php';

if (!empty($_POST['btnGuardar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST["cedula"];
    $correo = $_POST["correo"];

    if (!empty($nombre) and !empty($apellido) and !empty($cedula) and !empty($correo)) {

        $sql = $conexion->query(" update estudiante set nombre='$nombre', apellido='$apellido', cedula='$cedula', correo='$correo' where idEstudiante=$id ");

        if ($sql == 1) {
            header("location:index.php");
        } else {
            echo '<div class="alert alert-danger">No se ha podido registrar</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Hay campos vacios</div>';
    }
}
