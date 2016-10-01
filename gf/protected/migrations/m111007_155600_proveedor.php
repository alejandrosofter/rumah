<?php

class m111007_155600_proveedor extends CDbMigration
{
	public function up()
	{
		$this->addColumn('proveedores', 'condicionIva', 'varchar(255)');
		$this->addColumn('proveedores', 'idClasificacionAfip', 'varchar(255)');
	}

	public function down()
	{
		echo "m111007_155600_proveedor does not support migration down.\n";
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