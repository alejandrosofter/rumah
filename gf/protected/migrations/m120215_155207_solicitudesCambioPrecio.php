<?php

class m120215_155207_solicitudesCambioPrecio extends CDbMigration
{
	public function up()
	{
            $this->createTable('solicitudesCambioPrecioFacturacion', array('idSolicitudPrecio' => 'pk',
            'idStock' => 'int',
            'importeLista' => 'float',
            'importeDescontado' => 'float',
                'idUsuario' => 'int',
                'fecha' => 'date',
                'nroInterno' => 'int',
			
            ));
	}

	public function down()
	{
		echo "m120215_155207_solicitudesCambioPrecio does not support migration down.\n";
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