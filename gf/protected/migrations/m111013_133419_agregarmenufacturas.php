<?php

class m111013_133419_agregarmenufacturas extends CDbMigration
{
	public function up()
	{
		$this->addColumn('clientes', 'panelDeControl', 'longtext');
		$this->addColumn('clientes', 'anotador', 'longtext');
	}

	public function down()
	{
		echo "m111013_133419_agregarmenufacturas does not support migration down.\n";
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