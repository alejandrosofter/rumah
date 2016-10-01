<?php

class m120523_130434_Reloj_IncidenciasMotivos extends CDbMigration
{
	public function up()
	{
		$this->createTable('reloj_Incidencias', array(
            'id' => 'pk',
            'idEmpleado' => 'int',
			'fechaInicio' => 'date',
			'fechaFin' => 'date',
			'idMotivos' => 'int',
			));
		}

	public function down()
	{
		echo "m120523_130434_Reloj_IncidenciasMotivos does not support migration down.\n";
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