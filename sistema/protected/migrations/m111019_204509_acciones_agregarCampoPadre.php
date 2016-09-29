<?php

class m111019_204509_acciones_agregarCampoPadre extends CDbMigration
{
	public function up()
	{
		$this->addColumn('acciones', 'padre', 'int');
	}

	public function down()
	{
		echo "m111019_204509_acciones_agregarCampoPadre does not support migration down.\n";
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