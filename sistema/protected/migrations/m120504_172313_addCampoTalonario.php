<?php

class m120504_172313_addCampoTalonario extends CDbMigration
{
	public function up()
	{
            $this->addColumn('talonario', 'descripcion', 'string');
	}

	public function down()
	{
		echo "m120504_172313_addCampoTalonario does not support migration down.\n";
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