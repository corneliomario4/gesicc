<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geotecnia, Supervisión, Ingeniería y Control de Calidad | ADMIN Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>

   

    <nav class="navbar border-bottom border-body" style="background-color:rgba(6, 48, 96, 0.744)" data-bs-theme="dark">


        <div class="container-fluid">
            <img src="./img/Logo GESICC.png" alt="Bootstrap" width="70" height="50">
            
        </div>

        
            
    </nav>

    <nav >
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Clientes</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Obras</button>
            
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
        <section style="padding-top: 3%; margin-bottom: 3%; padding-left: 10%; padding-right: 10%;">
            <h3>Administración de clientes</h3>
            <h5>Agregar nuevo cliente</h5>

            <?php
                if(isset($_GET['sc'])){
                    
                    if($_GET['sc']=='200')
                    {
                        echo("<div class='alert alert-success' role='alert'>Cliente agregado correctamente</div>");
                    }
                    elseif ($_GET['sc']=='400') {
                        echo("<div class='alert alert-danger' role='alert'>Ha ocurrido un error al agregar el cliente, por favor intente de nuevo.</div>");
                    }
                    elseif ($_GET['sc']=='201') {
                        echo("<div class='alert alert-success' role='alert'>Cliente eliminado correctamente</div>");
                    }
                    elseif ($_GET['sc']=='401') {
                        echo("<div class='alert alert-danger' role='alert'>Ha ocurrido un error al eliminar el cliente, por favor intente de nuevo.</div>");
                    }
                }
            ?>

            <form action="./clientes.php?action=add" method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del cliente</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="rfc" class="form-label">R.F.C.</label>
                    <input type="text" class="form-control" name="rfc" required>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="direccion" required>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="text" class="form-control" name="correo">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <h5 style="margin-top: 5%;">Listado de clientes</h5>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">R.F.C.</th>
                    <th scope="col">Nombre o Razón Social</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Correo electrónico</th>
                    <th scope="col">Acciones disponibles</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        require_once './conexion.php';
                        $sql = "select * from clientes;";
                        $result = mysqli_query($conexion, $sql);

                        if ($result) {
                            // Verificamos si hay resultados
                            if (mysqli_num_rows($result) > 0) {
                                // Recorremos los resultados
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $rfc = $row["rfc"];
                                    $nombre = $row['nombre'];
                                    $direccion = $row["direccion"];
                                    $correo = $row["correo"];
                                    echo(
                                        "<tr>"
                                        ."<th style='color:black;' scope='row'>$rfc</th>"
                                        ."<td>$nombre</td>"
                                        ."<td>$direccion</td>"
                                        ."<td>$correo</td>"
                                        ."<td><button class='btn btn-danger'><a style='text-decoration: none; color: white' href='./clientes.php?action=remove&rfc=$rfc'>Eliminar</a></button></td>"
                                        ."</tr>"
                                    );
                                }
                            } else {
                                echo(
                                    "<tr> No hay clientes registrados </tr>"
                                );
                            }
                        } else {
                            echo "Error en la consulta: " . mysqli_error($conexion);
                        }

                        
                    ?>
                
                </tbody>
            </table>
        </section>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
        <section style="padding-top: 3%; margin-bottom: 3%; padding-left: 10%; padding-right: 10%;">
        <h3>Administración de Obras</h3>
            <h5>Agregar nueva obra</h5>

            <?php
                if(isset($_GET['sc'])){
                    
                    if($_GET['sc']=='203')
                    {
                        echo("<div class='alert alert-success' role='alert'>Registro guardado correctamente</div>");
                    }
                    elseif ($_GET['sc']=='403') {
                        echo("<div class='alert alert-danger' role='alert'>Ha ocurrido un error al agregar la obra, por favor intente de nuevo.</div>");
                    }
                    elseif ($_GET['sc']=='204') {
                        echo("<div class='alert alert-success' role='alert'>Registro eliminado correctamente</div>");
                    }
                    elseif ($_GET['sc']=='404') {
                        echo("<div class='alert alert-danger' role='alert'>Ha ocurrido un error al eliminar la obra, por favor intente de nuevo.</div>");
                    }
                }
            ?>

            <form action="./obras.php?action=add" method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de la obra</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="contrato" class="form-label">Numero de contrato</label>
                    <input type="text" class="form-control" name="contrato" required>
                </div>
                 <!--  TODO // Select dinámico con los clientes registrados  -->
                <div class="mb-3">
                    <label for="cliente" class="form-label">Cliente</label>
                    <select class="form-select" name="cliente" aria-label="Default select example">
                        <option selected>- Seleccione una opción</option>
                        <?php
                        
                        $sql2 = "select * from clientes;";
                        $result2 = mysqli_query($conexion, $sql2);

                        if ($result2) {
                            // Verificamos si hay resultados
                            if (mysqli_num_rows($result2) > 0) {
                                // Recorremos los resultados
                                while ($row = mysqli_fetch_assoc($result2)) {
                                    $rfc = $row["rfc"];
                                    $nombre = $row['nombre'];
                                    $direccion = $row["direccion"];
                                    $correo = $row["correo"];
                                    echo(
                                        "<option value='${rfc}'>$nombre</option>"
                                    );
                                }
                            } else {
                                echo(
                                    "<option value=''>No hay clientes registrados aún</option>"
                                );
                            }
                        } else {
                            echo "Error en la consulta: " . mysqli_error($conexion);
                        }
                    ?>
        
                    </select>
                </div>
                <div class="mb-3">
                    <label for="servicio" class="form-label">Servicio prestado</label>
                    <input type="text" class="form-control" name="servicio" required>
                </div>
                <div class="mb-3">
                    <label for="direccion_obra" class="form-label">Dirección de la obra</label>
                    <input type="text" class="form-control" name="direccion_obra" required>
                </div>
                <div class="mb-3">
                    <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
                    <input type="date" class="form-control" name="fecha_inicio">
                </div>
                <div class="mb-3">
                    <label for="fecha_fin" class="form-label">Fecha de finalización de la obra</label>
                    <input type="date" class="form-control" name="fecha_fin">
                </div>
                <button type="submit" class="btn btn-primary">Guardar registro</button>
            </form>


            <h5 style="margin-top: 5%;">Listado de clientes</h5>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Contrato No.</th>
                    <th scope="col">Nombre de la obra</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Fecha de inicio</th>
                    <th scope="col">Fecha de finalización</th>
                    <th scope="col">Acciones disponibles</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $sql3 = "select a.*, b.nombre from obras as a INNER JOIN clientes as b ON a.cliente = b.rfc;";
                        $result3 = mysqli_query($conexion, $sql3);

                        if ($result3) {
                            // Verificamos si hay resultados
                            if (mysqli_num_rows($result3) > 0) {
                                // Recorremos los resultados
                                while ($row2 = mysqli_fetch_assoc($result3)) {
                                    $contrato = $row2['contrato'];
                                    $nombre_obra = $row2['nombre_obra'];
                                    $cliente = $row2['nombre'];
                                    $direccion = $row2['direccion_obra'];
                                    $fecha_inicio = $row2['fecha_inicio'];
                                    $fecha_fin = $row2['fecha_fin'];

                                    echo(
                                        "<tr>"
                                        ."<th style='color:black;' scope='row'>$contrato</th>"
                                        ."<td>$nombre_obra</td>"
                                        ."<td>$cliente</td>"
                                        ."<td>$direccion</td>"
                                        ."<td>$fecha_inicio</td>"
                                        ."<td>$fecha_fin</td>"
                                        ."<td><button class='btn btn-danger'><a style='text-decoration: none; color: white' href='./obras.php?action=remove&contrato=$contrato'>Eliminar</a></button></td>"
                                        ."</tr>"
                                    );
                                }
                            } else {
                                echo(
                                    "<tr> No hay registros </tr>"
                                );
                            }
                        } else {
                            echo "Error en la consulta: " . mysqli_error($conexion);
                        } 

                        
                    ?>
        </section>
    </div>



    <?php

        // Cerrar la conexión
        mysqli_close($conexion);

    ?>
    

    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>