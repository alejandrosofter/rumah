<?php

class m111018_170519_nuevasAccionesPRecios extends CDbMigration
{
	public function up()
	{
		$sql="UPDATE  `gfoxV3`.`acciones` SET  `subTipo` =  'precios' WHERE  `acciones`.`idAccion` =33;";
		$this->execute($sql);
		
		$sql="INSERT INTO  `gfoxV3`.`acciones` (
`idAccion` ,
`nombre` ,
`direccion` ,
`tipo` ,
`subTipo` ,
`descripcion` ,
`imagen`
)
VALUES (
NULL ,  'Modificar Precios por Compra',  'index.php?r=stock/cambiarPrecioCompras',  'productos',  'precios',  'Modifica los precios solamente de la compra seleccionada.', NULL
), (
NULL ,  'Modificar Precios por Categoria',  'index.php?r=stockTipoProducto',  'productos',  'precios',  'Cambia los precios solamente de la categoría seleccionada.', NULL
);
INSERT INTO  `gfoxV3`.`acciones` (
`idAccion` ,
`nombre` ,
`direccion` ,
`tipo` ,
`subTipo` ,
`descripcion` ,
`imagen`
)
VALUES (
NULL ,  'Modificar Precios por Inventario',  'index.php?r=inventarios',  'productos',  'precios',  'Cambia los precios solamente a los productos del inventario.', NULL
), (
NULL ,  'Ver Precios Asignados',  'index.php?r=stockPrecios',  'servicios',  'precios',  'Modificar los precios de los servicios ofrecidos.', NULL
),(
NULL ,  'Modificar precios de Servicios',  'index.php?r=stock/aplicarPreciosServicios',  'servicios',  'precios',  'Modificar los precios de los servicios ofrecidos.', NULL
);";
		$this->execute($sql);
		

	}

	public function down()
	{
		echo "m111018_170519_nuevasAccionesPRecios does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}