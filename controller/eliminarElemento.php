<?php
include '../model/conexion.php';

$id = $_GET['id'];

if ($id != null) {
    $sql = $conexion->query("delete from estudiante where idEstudiante=$id");
    if ($sql == 1) {
        header("location:../index.php");
    } else {
        echo "Error al borrar";
    }
}

?>