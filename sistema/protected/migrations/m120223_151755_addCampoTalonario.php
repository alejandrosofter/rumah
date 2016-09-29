<?php

class m120223_151755_addCampoTalonario extends CDbMigration
{
	public function up()
	{
             $this->addColumn('talonario', 'predeterminado', 'int');
	}

	public function down()
	{
		echo "m120223_151755_addCampoTalonario does not support migration down.\n";
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