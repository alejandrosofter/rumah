<?php

class m120530_145315_reloj_modeloEmpleado extends CDbMigration
{
	public function up()
	{
		$this->createTable('reloj_modeloEmpleado', array(
            'id' => 'pk',
            'idCategoria' => 'int',
			'diaInicio' => 'int', //dia de mes que comienza
			'diaFin' => 'int',    // dia del mes que termina
			'nroDiaInicio' => 'int', //el dia de la semana que arranca
			'nroDiaFin' => 'int',    // el dia de la semana que termina
			));
	}

	public function down()
	{
		echo "m120530_145315_reloj_modeloEmpleado does not support migration down.\n";
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