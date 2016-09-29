<?php

class m111215_185659_nuevosCamposMensaje extends CDbMigration
{
	public function up()
	{
            $this->addColumn('mensajes', 'idReferencia', 'int');
	}

	public function down()
	{
		echo "m111215_185659_nuevosCamposMensaje does not support migration down.\n";
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