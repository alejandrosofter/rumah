<?php

class m120530_123759_actualizarCargarHoras_30Mayo extends CDbMigration
{
	public function up()
	{
		$this->addColumn('Reloj_cargarHora', 'fechaDesde', 'date');
		$this->addColumn('Reloj_cargarHora', 'fechaHasta', 'date');
	}

	public function down()
	{
		echo "m120530_123759_actualizarCargarHoras_30Mayo does not support migration down.\n";
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