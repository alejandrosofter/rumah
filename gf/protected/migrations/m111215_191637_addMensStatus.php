<?php

class m111215_191637_addMensStatus extends CDbMigration
{
	public function up()
	{
            $this->addColumn('mensajes', 'stausMail', 'string');
	}

	public function down()
	{
		echo "m111215_191637_addMensStatus does not support migration down.\n";
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