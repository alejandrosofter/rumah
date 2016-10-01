<?php

class m111007_160355_clasificacionAfip extends CDbMigration
{
	public function up()
	{
		$this->createTable('clasificacionAfip', array('idClasificacionAfip' => 'pk',
            'nombreClasificacionAfip' => 'string',
            'codigoClasificacion' => 'string',
            'detalle' => 'string',
            ));
	}

	public function down()
	{
		$this->dropTable('clasificacionAfip');
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