<?php

class m111012_164651_addmenucompras extends CDbMigration
{
	public function up()
	{
		$this->insert('acciones', array(
   
   'nombre' => 'Nueva Condicion de Venta',
   'direccion' => 'index.php?r=condicionesVenta/create',
   'tipo' => 'facturas_venta',
   'descripcion' => 'Ingresar nueva condicion de venta',

));
$this->insert('acciones', array(
   
   'nombre' => 'Ver Condiciones de Venta',
   'direccion' => 'index.php?r=condicionesVenta/index',
   'tipo' => 'facturas_venta',
   'descripcion' => 'Ver condiciones de venta',

));
$this->insert('acciones', array(
   
   'nombre' => 'Nueva Condicion de venta Items',
   'direccion' => 'index.php?r=condicionesVentaItems/create',
   'tipo' => 'facturas_venta',
   'descripcion' => 'Ingresar nueva condicion de venta Items',

));
$this->insert('acciones', array(
   
   'nombre' => 'Ver Condiciones de venta Items',
   'direccion' => 'index.php?r=condicionesVentaItems/index',
   'tipo' => 'facturas_venta',
   'descripcion' => 'Ver condiciones de venta Items',

));
$this->insert('acciones', array(
   
   'nombre' => 'Nueva Orden de Cobro',
   'direccion' => 'index.php?r=ordenesCobro/create',
   'tipo' => 'facturas_venta',
   'descripcion' => 'Ingresar nueva orden de cobro',

));
$this->insert('acciones', array(
   
   'nombre' => 'Ver Ordenes de Cobro',
   'direccion' => 'index.php?r=ordenesCobro/index',
   'tipo' => 'facturas_venta',
   'descripcion' => 'Ver ordenes de cobro',

));

	}

	public function down()
	{
		echo "m111012_164651_addmenucompras does not support migration down.\n";
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