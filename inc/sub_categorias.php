<?php
$sub_categoria = array(
	
	1 => array (
		'id_sub_categoria' => 1,
		'nombre' => 'Usado',
),


);

file_put_contents('json/sub_categorias.json', json_encode($sub_categoria));
