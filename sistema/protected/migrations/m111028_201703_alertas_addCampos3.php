<?php

class m111028_201703_alertas_addCampos3 extends CDbMigration
{
	public function up()
	{
		$this->addColumn('alertas', 'idElemento', 'int');
	}

	public function down()
	{
		echo "m111028_201703_alertas_addCampos3 does not support migration down.\n";
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