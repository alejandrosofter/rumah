<?php

class m111206_140000_settings extends CDbMigration
{
	public function up()
	{
		$this->addColumn('settings', 'descripcion', 'longtext');
	}

	public function down()
	{
		echo "m111206_140000_settings does not support migration down.\n";
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