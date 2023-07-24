<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        html,
        body,
        .container-fluid {
            height: 100%;
        }

        body {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

    <!-- formulario -->
    <div class="container-fluid row align-items-center justify-content-center">
        <form class="col-4 p-4" method="POST">
            <h3 class="center-text">Editar Estudiante</h3>

            <?php
            include 'model/conexion.php';
            include 'controller/modificarElemento.php';
            $id = $_GET['id'];

            $sql = $conexion->query("select * from estudiante where idEstudiante=$id"); //Le asignamos a $sql los datos que traemos de la db
            while ($datos = $sql->fetch_object()) {  // le asignamos a datos un array con los valores de la consulta usando fetch_object
            ?>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombreInput" name="nombre" value="<?= $datos->nombre ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidoInput" name="apellido" value="<?= $datos->apellido ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Cedula</label>
                    <input type="text" class="form-control" id="cedulaInput" name="cedula" value="<?= $datos->cedula ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Correo</label>
                    <input type="text" class="form-control" id="correoInput" name="correo" value="<?= $datos->correo ?>">
                </div>

            <?php
            }
            ?>

            <!-- atavez de este input paso el id para poder modificar y hacer la consulta -->
            <input type="hidden" name="id" value="<?= $id = $_GET["id"] ?>">

            <div class="row">
                <div class="col">
                    <a href="index.php" class="btn btn-secondary">Volver</a>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-warning" name="btnRestablecer">Restablacer</button>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-success" name="btnGuardar" value="ok">Guardar</button>
                </div>

            </div>



        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>