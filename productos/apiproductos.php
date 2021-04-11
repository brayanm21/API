<?php

include_once 'producto.php';

class ApiProductos{


    function getAll(){
        $producto = new producto();
        $productos = array();
        $productos["Productos"] = array();

        $res = $producto->obtenerProductos();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "id" => $row['id'],
                    "titulo" => $row['titulo'],
                    "descripcion" => $row['descripcion'],
                    "precio" => $row['precio'],
                    "descuento" => $row['descuento'],
                );
                array_push($productos["Productos"], $item);
            }
        
            echo json_encode($productos);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }
}

?>