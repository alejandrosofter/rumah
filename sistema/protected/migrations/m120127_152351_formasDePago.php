<?php

class m120127_152351_formasDePago extends CDbMigration
{
	public function up()
	{
            $this->createTable('formasDePago', array('idFormaPago' => 'pk',
            'nombreForma' => 'string  NOT NULL',
            'tipoForma' => 'string',
			'cantidadCuotas' => 'int',
                'intereses' => 'float',
                'ingresoEgreso' => 'int',
			
            ));
	}

	public function down()
	{
		echo "m120127_152351_formasDePago does not support migration down.\n";
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