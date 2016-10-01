<?php

class m111220_141213_tareasDestinatarioadd extends CDbMigration
{
	public function up()
	{
            $this->addColumn('tareas_destinatarios', 'idUsuarioEmisor', 'int');
	}

	public function down()
	{
		echo "m111220_141213_tareasDestinatarioadd does not support migration down.\n";
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