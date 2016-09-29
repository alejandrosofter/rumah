<?php

class m111028_160939_alertas_crear extends CDbMigration
{
	public function up()
	{
		$this->createTable('alertas', array('idAlerta' => 'pk',
            'titulo' => 'string',
            'descripcion' => 'text',
            'nivelAlerta' => 'string',
            'tipoAlerta' => 'string',
            'estadoAlerta' => 'string',
            'fechaVencimiento' => 'date',
            'linkSolucion' => 'text',
            ));
	}

	public function down()
	{
		echo "m111028_160939_alertas_crear does not support migration down.\n";
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