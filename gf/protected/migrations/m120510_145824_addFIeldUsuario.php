<?php

class m120510_145824_addFIeldUsuario extends CDbMigration
{
	public function up()
	{
            $this->addColumn('usuarios', 'dash', 'text');
	}

	public function down()
	{
		echo "m120510_145824_addFIeldUsuario does not support migration down.\n";
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