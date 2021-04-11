<?php
include_once "db.php";

header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
$jsonProducto = file_get_contents("php://input");
$objetoProductoPHP  = json_decode($jsonProducto,true);

$Titulo = $objetoProductoPHP["Titulo"];
$Descripcion = $objetoProductoPHP["Descripcion"];
$Precio = $objetoProductoPHP["Precio"];git
$Descuento = $objetoProductoPHP["Descuento"];
$Diasdescuento = $objetoProductoPHP["Diasdescuento"];

$consulta = "INSERT INTO productos
(titulo, descripcion, precio, descuento, diasdescuento) VALUES ('$Titulo','$Descripcion','$Precio','$Descuento','$Diasdescuento')";

$connection = mysqli_connect("localhost","root","","cocoproyecto");
if (mysqli_query($connection ,$consulta) ){
    echo "<p>Registro agregado.</p>";
    } else {
    echo "<p>No se agregó...</p>";
    }

?>