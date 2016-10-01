<?php

class m120523_120943_actualizarTablaEmpleados extends CDbMigration
{
	public function up()
	{
		$this->addColumn('Reloj_empleados', 'horasPactadas', 'int');
	}

	public function down()
	{
		echo "m120523_120943_actualizarTablaEmpleados does not support migration down.\n";
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