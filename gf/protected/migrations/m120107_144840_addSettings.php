<?php

class m120107_144840_addSettings extends CDbMigration
{
	public function up()
	{
            $this->addColumn('settings', 'idUsuario', 'int');
	}

	public function down()
	{
		echo "m120107_144840_addSettings does not support migration down.\n";
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