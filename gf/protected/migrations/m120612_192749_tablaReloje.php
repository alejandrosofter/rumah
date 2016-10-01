<?php

class m120612_192749_tablaReloje extends CDbMigration
{
	public function up()
	{
             $this->addColumn('reloj_motivos', 'porcentajeCubre', 'int');
	}

	public function down()
	{
		echo "m120612_192749_tablaReloje does not support migration down.\n";
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