<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
$jsonProducto = file_get_contents("php://input");
$objetoProductoPHP  = json_decode($jsonProducto,true);
var_dump ($objetoProductoPHP);
echo gettype($objetoProductoPHP["Descuento"]);
if (!$objetoProductoPHP) {
    exit("No hay datos");
}

    $db = include_once "db.php";
    //$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
$sentencia = $db->prepare("insert into productos(titulo, descripcion, precio, descuento, diasdescuento) values (?,?,?,?,?)");
$resultado = $sentencia->execute([$objetoProductoPHP["Titulo"], $objetoProductoPHP["Descripcion"], $objetoProductoPHP["Precio"],$objetoProductoPHP["Descuento"],$objetoProductoPHP["Diasdescuento"]]);
//print_r($db->errorInfo());
echo json_encode([

    "resultado" => $resultado,
]);
?>