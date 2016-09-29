<?php

class m111006_171534_agregarCondicionFactura extends CDbMigration
{
	public function up()
	{
		$this->addColumn('facturasEntrantes', 'idCondicionCompra', 'int');
	}

	public function down()
	{
		$this->dropColumn('facturasEntrantes', 'idCondicionCompra');
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