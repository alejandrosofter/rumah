<?php

class m111004_170341_clientesproveedor extends CDbMigration
{
	public function up()
	{
		$sql="ALTER TABLE `clientes` ADD `letraHabitual` VARCHAR( 2 ) NOT NULL;
		INSERT INTO `acciones` (`idAccion`, `nombre`, `direccion`, `tipo`, `descripcion`, `imagen`) VALUES
('', 'Informe Clientes', 'index.php?r=impresiones/create&tipoImpresion=clientes', 'informes', 'Listado de clientes', ''),
('', 'Informe Proveedores', 'index.php?r=impresiones/create&tipoImpresion=proveedores', 'informes', 'Listado de Proveedores', '');
		
 
INSERT INTO `settings` (`id`, `category`, `key`, `value`) VALUES
('', 'system', 'IMPRESION_CLIENTES', '<p>&nbsp;Listado de clientes</p>\r\n<p>%clientes</p>'),
('', 'system', 'IMPRESION_PROVEEDOR', '<p>&nbsp;Lista de proveedores</p>\r\n<p>%proveedores</p>'); ";
		$this->execute($sql); 
		
	}

	public function down()
	{
		echo "m111004_170341_clientesproveedor does not support migration down.\n";
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