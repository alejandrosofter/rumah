<?php

class m111216_203248_camposUsuario extends CDbMigration
{
	public function up()
	{
            // $this->addColumn('usuarios', 'mobil', 'string');
	}

	public function down()
	{
		echo "m111216_203248_camposUsuario does not support migration down.\n";
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