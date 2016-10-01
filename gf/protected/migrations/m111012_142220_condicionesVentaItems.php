<?php

class m111012_142220_condicionesVentaItems extends CDbMigration
{
	public function up()
	{
		$this->createTable('condicionesVenta', array('idCondicionVenta' => 'pk',
            'descripcionVenta' => 'string',
            'generaFacturaCredito' => 'string',
            ));
	}

	public function down()
	{
		echo "m111012_142220_condicionesVentaItems does not support migration down.\n";
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