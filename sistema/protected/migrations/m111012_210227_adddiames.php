<?php

class m111012_210227_adddiames extends CDbMigration
{
	public function up()
	{
		
		$this->addColumn('condicionesVentaItems', 'letraDiaMes', 'varchar(4)');
	}

	public function down()
	{
		echo "m111012_210227_adddiames does not support migration down.\n";
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