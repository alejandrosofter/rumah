<?php

class m120124_163025_addCampoOrdenes extends CDbMigration
{
	public function up()
	{
            $this->addColumn('ordenesTrabajo', 'duracionDias', 'int');
	}

	public function down()
	{
		echo "m120124_163025_addCampoOrdenes does not support migration down.\n";
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