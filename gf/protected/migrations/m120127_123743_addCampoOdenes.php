<?php

class m120127_123743_addCampoOdenes extends CDbMigration
{
	public function up()
	{
            //$this->addColumn('ordenesTrabajo_estados', 'idUsuario', 'int');
            $this->addColumn('ordenesTrabajo', 'idUsuario', 'int');
	}

	public function down()
	{
		echo "m120127_123743_addCampoOdenes does not support migration down.\n";
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