<?php
    include_once './include/conection.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO PHP</title>
    <link rel="stylesheet" href="./css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $objCon = new Conexion();
        $sql = 'SELECT * FROM REGISTRADOS';
        $rs=$objCon->getConexion()->query($sql);
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">Navegador</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page">Home</a>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#regis">Agregar</button>
                </li>
            </ul>
        <div class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </div>
        </div>
    </div>
    </nav>
    <br>

    <div class="container">
        <table id="tabla" class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Personal</th>
                    <th>Domicilio</th>
                    <th>Distrito</th>
                    <th>Telefono</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody id="ajaxtable">
                
            </tbody>
        </table>
    </div>
    <!--modal de registro-->
    <div id="regis" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Formulario de Registro</h3>
                </div>
                <div class="modal-body">
                    <p id="message"></p>
                    <form>
                        <input type="text" id="nombre" class="form-control my-2" placeholder="Nombre">
                        <input type="text" id="domicilio" class="form-control my-2" placeholder="Domicilio">
                        <input type="text" id="distrito" class="form-control my-2" placeholder="Distrito">
                        <input type="tel" id="telefono" class="form-control my-2" placeholder="Telefono" maxlength="8">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"  id="btn_registro">Registrarse</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Modal Update-->
    <div id="editmodal" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Formulario de Edit</h3>
                </div>
                <div class="modal-body">
                    <p id="up-message"></p>
                    <form>
                        <input type="hidden" id="up_nombre_id" class="form-control my-2" placeholder="Nombre">
                        <input type="text" id="up_nombre" class="form-control my-2" placeholder="Nombre">
                        <input type="text" id="up_domicilio" class="form-control my-2" placeholder="Domicilio">
                        <input type="text" id="up_distrito" class="form-control my-2" placeholder="Distrito">
                        <input type="tel" id="up_telefono" class="form-control my-2" placeholder="Telefono" maxlength="8">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"  id="btn_update">Guardar cambios</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Modal Delete-->
    <div id="deletemodal" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Eliminar Columna</h3>
                </div>
                <div class="modal-body">
                    <p id="delete-message"></p>
                    <form>
                        <input type="text" id="delete_nombre" class="form-control my-2" placeholder="Nombre" disabled>
                        <input type="text" id="delete_domicilio" class="form-control my-2" placeholder="Domicilio" disabled>
                        <input type="text" id="delete_distrito" class="form-control my-2" placeholder="Distrito" disabled>
                        <input type="tel" id="delete_telefono" class="form-control my-2" placeholder="Telefono" maxlength="8" disabled>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"  id="eliminardb">Eliminar Columna</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./js/bootstrap.js"></script>
<script src="./js/Jquery.js"></script>
<script src="./js/code.js"></script>
</html>