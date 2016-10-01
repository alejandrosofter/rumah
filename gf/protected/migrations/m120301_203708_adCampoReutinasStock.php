<?php

class m120301_203708_adCampoReutinasStock extends CDbMigration
{
	public function up()
	{
            $this->addColumn('rutinas_ordenesTrabajo', 'idStock', 'int');
	}

	public function down()
	{
		echo "m120301_203708_adCampoReutinasStock does not support migration down.\n";
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