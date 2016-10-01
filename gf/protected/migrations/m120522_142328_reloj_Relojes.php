<?php

class m120522_142328_reloj_Relojes extends CDbMigration
{
	public function up()
	{
		$this->createTable('reloj_Relojes', array(
            'id' => 'pk',
            'modelo' => 'string',
			));
	}

	public function down()
	{
		echo "m120522_142328_reloj_Relojes does not support migration down.\n";
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