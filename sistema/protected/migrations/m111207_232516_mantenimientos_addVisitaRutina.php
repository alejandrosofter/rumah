<?php

class m111207_232516_mantenimientos_addVisitaRutina extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tareas', 'visitaRutina', 'boolean');
	}

	public function down()
	{
		echo "m111207_232516_mantenimientos_addVisitaRutina does not support migration down.\n";
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