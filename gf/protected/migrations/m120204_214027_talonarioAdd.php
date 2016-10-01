<?php

class m120204_214027_talonarioAdd extends CDbMigration
{
	public function up()
	{
            $this->addColumn('talonario', 'esElectronica', 'int');
             $this->addColumn('talonario', 'certificado', 'string');
	}

	public function down()
	{
		echo "m120204_214027_talonarioAdd does not support migration down.\n";
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