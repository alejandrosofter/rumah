<?php

class m111208_204532_envioMensajes_addTAbla extends CDbMigration
{
	public function up()
	{
		$this->createTable('mensajes', array('idMensaje' => 'pk',
            'cuerpoMensaje' => 'longtext',
            'tituloMensaje' => 'string',
		 'tipoMensaje' => 'string',
		 'fechaMensaje' => 'datetime',
		 'destinatario' => 'string',
		 'remitente' => 'string',
		 
            ));
	}

	public function down()
	{
		echo "m111208_204532_envioMensajes_addTAbla does not support migration down.\n";
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