<?php

class m111028_200415_alertas_addCampos2 extends CDbMigration
{
	public function up()
	{
		$this->addColumn('alertas', 'controlador', 'string');
	}

	public function down()
	{
		echo "m111028_200415_alertas_addCampos2 does not support migration down.\n";
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