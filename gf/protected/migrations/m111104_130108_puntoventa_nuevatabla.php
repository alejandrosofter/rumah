<?php

class m111104_130108_puntoventa_nuevatabla extends CDbMigration
{
	public function up()
	{
		
		$this->createTable('puntoVenta', array('idPuntoVenta' => 'pk',
            'nombrePuntoVenta' => 'string  NOT NULL',
            'descripcionPuntoVenta' => 'string',
			'electronica' => 'string',
			
            ));
		
	}

	public function down()
	{
		echo "m111104_130108_puntoventa_nuevatabla does not support migration down.\n";
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