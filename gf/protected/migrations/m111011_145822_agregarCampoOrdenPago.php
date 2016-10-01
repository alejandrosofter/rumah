<?php

class m111011_145822_agregarCampoOrdenPago extends CDbMigration
{
	public function up()
	{
		$this->addColumn('ordenesPago_vencimientos', 'idOrdenPago', 'int');
	}

	public function down()
	{
		echo "m111011_145822_agregarCampoOrdenPago does not support migration down.\n";
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