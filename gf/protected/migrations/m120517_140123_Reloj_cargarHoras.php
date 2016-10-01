<?php

class m120517_140123_Reloj_cargarHoras extends CDbMigration
{
	public function up()
	{
		$this->createTable('Reloj_cargarHora', array(
            'id' => 'pk',
            'fecha' => 'date',
			'archivo' => 'longtext',
			'idUsuario' => 'int',
			'idSucursal' => 'int',
			'nombreArchivo' => 'string',
			));
	}

	public function down()
	{
		echo "m120517_140123_Reloj_cargarHoras does not support migration down.\n";
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