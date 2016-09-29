<?php

class m111012_142207_condicionVenta extends CDbMigration
{
	public function up()
	{
		$this->createTable('condicionesVentaItems', array('idCondicionVentaItem' => 'pk',
            'idCondicionVenta' => 'int',
            'porcentajeTotalFacturado' => 'float',
		 'cantidadCuotas' => 'int',
		 'aVencerEnDias' => 'int',
		 'CantidadDiasMesesCuotas' => 'int',
		 'porcentajeInteres' => 'float',
		 'fechaVencimiento' => 'date',
		'calculo' => 'string',
            ));
	}

	public function down()
	{
		echo "m111012_142207_condicionVenta does not support migration down.\n";
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