<?php

class m120323_181153_addCampoTalonario extends CDbMigration
{
	public function up()
	{
            $this->addColumn('talonario', 'codigoPuntoVenta', 'string');
	}

	public function down()
	{
		echo "m120323_181153_addCampoTalonario does not support migration down.\n";
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