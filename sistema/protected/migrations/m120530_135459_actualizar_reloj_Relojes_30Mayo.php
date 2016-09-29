<?php

class m120530_135459_actualizar_reloj_Relojes_30Mayo extends CDbMigration
{
	public function up()
	{
		$this->addColumn('reloj_Relojes', 'formato', 'string');
	}

	public function down()
	{
		echo "m120530_135459_actualizar_reloj_Relojes_30Mayo does not support migration down.\n";
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