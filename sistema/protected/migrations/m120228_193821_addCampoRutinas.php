<?php

class m120228_193821_addCampoRutinas extends CDbMigration
{
	public function up()
	{
             $this->addColumn('rutinas_ordenesTrabajo', 'esPredeterminada', 'int');
	}

	public function down()
	{
		echo "m120228_193821_addCampoRutinas does not support migration down.\n";
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