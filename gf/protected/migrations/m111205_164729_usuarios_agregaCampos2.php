<?php

class m111205_164729_usuarios_agregaCampos2 extends CDbMigration
{
	public function up()
	{
		$this->addColumn('usuarios', 'panelDeControl', 'longtext');
		$this->addColumn('usuarios', 'anotador', 'longtext');
	}

	public function down()
	{
		echo "m111205_164729_usuarios_agregaCampos2 does not support migration down.\n";
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