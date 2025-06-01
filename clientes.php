<?php
require_once './conexion.php';


$accion = $_GET['action'];

if($accion=='add'){
    $nombre = $_POST['nombre'];
    $rfc = $_POST['rfc'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];

    $sql = "INSERT INTO clientes (rfc, nombre, direccion, correo) VALUES ('$rfc', '$nombre', '$direccion', '$correo');";

    if (mysqli_query($conexion, $sql)) {
        header("location: ./admin.php?sc=200");
    } else {
        header("location: ./admin.php?sc=400");
    }

    mysqli_close($conexion);
}
elseif ($accion = 'remov') {
    $rfc = $_GET['rfc'];
    $sql = "DELETE FROM clientes WHERE rfc='$rfc';";

    if (mysqli_query($conexion, $sql)) {
        header("location: ./admin.php?sc=201");
    } else {
        header("location: ./admin.php?sc=401");
    }

    mysqli_close($conexion);

}

?>