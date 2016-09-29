<?php

class m120611_132234_tablaReloj extends CDbMigration
{
	public function up()
	{
            $this->createTable('reloj_resultadoHoras', array(
            'id' => 'pk',
            'idEmpleado' => 'int',
			'fechaInicio' => 'int', //dia de mes que comienza
			'fechaFin' => 'int',    // dia del mes que termina
			));
            $this->addColumn('reloj_incidencias', 'esJustificado', 'int');
	}

	public function down()
	{
		echo "m120611_132234_tablaReloj does not support migration down.\n";
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