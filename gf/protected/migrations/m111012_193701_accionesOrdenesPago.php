<?php

class m111012_193701_accionesOrdenesPago extends CDbMigration
{
	public function up()
	{
		$this->insert('acciones',array('nombre'=>'Ver Ordenes de Pago'
		,'direccion'=>'index.php?r=ordenesPago'
		,'tipo'=>'facturas_compra'
		,'descripcion'=>'Vista de las ordenes de pago.'));
		
		$this->insert('acciones',array('nombre'=>'Ingreso de Pagos'
		,'direccion'=>'index.php?r=ordenesPago/create'
		,'tipo'=>'facturas_compra'
		,'descripcion'=>'Nueva forma para realizar el pago de una compra'));

	}

	public function down()
	{
		echo "m111012_193701_accionesOrdenesPago does not support migration down.\n";
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