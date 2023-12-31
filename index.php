<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP-MySQL-BOOTSTRAP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

    <h1 class="text-center p-2">CRUD PHP</h1>


    <!-- formulario de registro -->
    <div class="container-fluid row">
        <form class="col-4 p-4" method="POST">
            <h3 class="font-weight-bold">Registro de estudiante</h3>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombreInput" name="nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidoInput" name="apellido">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cedula</label>
                <input type="text" class="form-control" id="cedulaInput" name="cedula">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="text" class="form-control" id="correoInput" name="correo">
            </div>

            <?php
            include 'model/conexion.php';
            include 'controller/registro_persona.php';
            ?>

            <div class="">
                <button type="submit" class="btn btn-primary mt-3" name="btnRegistrar" value="ok">Registrar</button>
            </div>

        </form>

        <div class="col-8 p-4">
            <!-- tabla para mostar la informacion almacenada -->
            <table class="table">
                <!-- cambiar color despues -->
                <thead class="bg-primary">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido(s)</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Email</th>
                        <th scope="col">Fecha de registro</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'model/conexion.php';

                    $sql = $conexion->query('select * from estudiante'); //Le asignamos a $sql los datos que traemos de la db en forma de objeto
                    while ($datos = $sql->fetch_object()) { 
                    ?>

                        <tr>
                            <th scope="row"><?= $datos->idEstudiante ?></th>
                            <td><?= $datos->nombre ?></td>
                            <td><?= $datos->apellido ?></td>
                            <td><?= $datos->cedula ?></td>
                            <td><?= $datos->correo ?></td>
                            <td><?= $datos->fechaIngreso ?></td>
                            <td>
                                <a class="btn btn-info p-1" href="modificarElemento.php?id=<?= $datos->idEstudiante ?>">Editar</a>
                                <a class="btn btn-danger p-1" href="controller/eliminarElemento.php?id=<?= $datos->idEstudiante ?>" onclick="return opcion()">Eliminar</a>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        function opcion() {
            let resultado = window.confirm('Esta seguro de borrar este registro?');
            if (resultado === true) {
                alert("El registro ha sido eliminado");
                return true;
            } else
                return false;
        };
    </script>
</body>

</html>