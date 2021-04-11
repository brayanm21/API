<?php

include_once 'db.php';

class Producto extends DB{
    
    function obtenerProductos(){
        $query = $this->connect()->query('SELECT * FROM productos');
        return $query;
    }

}

?>