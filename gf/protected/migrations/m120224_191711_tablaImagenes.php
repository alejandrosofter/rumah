<?php

class m120224_191711_tablaImagenes extends CDbMigration
{
	public function up()
	{
            $this->createTable('imagenes', array('idImagen' => 'pk',
                'fecha' => 'dateTime',
            'tipo' => 'string',
            'idTipo' => 'int',
                'nombreImagen' => 'string',
                'ext' => 'string',
                'path' => 'string',

            ));
	}

	public function down()
	{
		echo "m120224_191711_tablaImagenes does not support migration down.\n";
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