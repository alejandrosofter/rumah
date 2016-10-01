<?php

class m111004_181027_addletracliente extends CDbMigration
{
	public function up()
	{
//		$sql="ALTER TABLE `clientes` ADD `letraHabitual` VARCHAR( 2 ) NOT NULL;
//		$this->addColumn('clientes', 'letraHabitual', 'varchar(2)');
	}

	public function down()
	{
		echo "m111004_181027_addletracliente does not support migration down.\n";
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