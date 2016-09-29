<?php

class m120224_145106_addCampoEmpresa extends CDbMigration
{
	public function up()
	{
            $this->addColumn('preVentas_estados', 'idPreVentaEmpresa', 'int');
	}

	public function down()
	{
		echo "m120224_145106_addCampoEmpresa does not support migration down.\n";
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