<?php
$categorias = array(
	
	1 => array (
		'id_categoria' => 1,
		'nombre' => 'Hardware',
),

2 => array (
	'id_categoria' => 2,
	'nombre' => 'Software',
),

3 => array (
	'id_categoria' => 3,
	'nombre' => 'Perifericos',
),

);

file_put_contents('json/categorias.json', json_encode($categorias));
?>