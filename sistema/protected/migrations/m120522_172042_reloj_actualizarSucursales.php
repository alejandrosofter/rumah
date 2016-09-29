<?php

class m120522_172042_reloj_actualizarSucursales extends CDbMigration
{
	public function up()
	{
		$this->addColumn('reloj_Sucursales', 'idReloj', 'int');
	}

	public function down()
	{
		echo "m120522_172042_reloj_actualizarSucursales does not support migration down.\n";
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