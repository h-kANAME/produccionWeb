<?php
include_once('../inc/con_db.php');

if ($connect) {
    $consulta = "SELECT * FROM productos";
    $resultado = $connect->query($consulta);
}

foreach ($resultado as $row) {
    $producto = $row['id_producto'];
    $modelo = $row['id_modelo'];
}

class Producto
{
    var $id_producto;
    var $descripcion;
    var $id_marca;
    var $id_categoria;
    var $modelo;
    var $destacado;
    var $precio;
    var $imagen;
    var $imagenMax;
    var $id_sub_categoria;
    var $estado_activo;

    function __construct($id_producto, $descripcion, $modelo, $precio)
    {
        $this->id_producto = $id_producto;
        $this->descripcion = $descripcion;
        $this->modelo = $modelo;
        $this->precio = $precio;
    }
}


