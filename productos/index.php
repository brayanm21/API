<?php
header('Access-Control-Allow-Origin: *');


    include_once 'apiproductos.php';

    $api = new ApiProductos();

    $api->getAll();
?>