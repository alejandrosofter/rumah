<?php

class m111116_150840_presupuestosItems_agregarCampo2 extends CDbMigration
{
	public function up()
	{
		$this->addColumn('presupuestoItems', 'idCondicionVenta', 'string');
	}

	public function down()
	{
		echo "m111116_150840_presupuestosItems_agregarCampo2 does not support migration down.\n";
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