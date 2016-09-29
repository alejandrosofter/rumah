<?php

class m111006_164211_agregarAccionesCondicionesCompra extends CDbMigration
{
	public function up()
	{
		$this->insert('acciones',array('nombre'=>'Condiciones de Compra'
		,'direccion'=>'index.php?r=condicionesCompra'
		,'tipo'=>'facturas_compra'
		,'descripcion'=>'Vea las formas que tiene para realizar el pago de una compra'));
		$this->insert('acciones',array('nombre'=>'Nueva Condicion de Compra'
		,'direccion'=>'index.php?r=condicionesCompra/create'
		,'tipo'=>'facturas_compra'
		,'descripcion'=>'Nueva forma para realizar el pago de una compra'));
	}

	public function down()
	{
		echo "m111006_164211_agregarAccionesCondicionesCompra does not support migration down.\n";
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