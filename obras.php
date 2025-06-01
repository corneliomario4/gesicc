<?php
require_once './conexion.php';


$accion = $_GET['action'];

if($accion=='add'){

    $nombre = $_POST['nombre'];
    $contrato = $_POST['contrato'];
    $cliente = $_POST['cliente'];
    $servicio = $_POST['servicio'];
    $direccion_obra = $_POST['direccion_obra'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

    $sql = "INSERT INTO obras (nombre_obra, contrato, cliente, servicio_prestado, direccion_obra, fecha_inicio, fecha_fin) VALUES ('$nombre', '$contrato', '$cliente', '$servicio', '$direccion_obra', '$fecha_inicio', '$fecha_fin');";


    if (mysqli_query($conexion, $sql)) {
        header("location: ./admin.php?sc=203");
    } else {
        echo "Error en la consulta: " . mysqli_error($conexion);
        die();
        header("location: ./admin.php?sc=403");
    }

    mysqli_close($conexion);
}
elseif ($accion = 'remov') {
    $contrato = $_GET['contrato'];
    $sql = "DELETE FROM obras WHERE contrato='$contrato';";

    if (mysqli_query($conexion, $sql)) {
        header("location: ./admin.php?sc=204");
    } else {
        header("location: ./admin.php?sc=404");
    }

    mysqli_close($conexion);

}

?>