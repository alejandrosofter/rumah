<?php

class m111006_163141_tablaCondicionesCompra extends CDbMigration
{
	public function up()
	{
		$this->createTable('condicionesCompra', array('idCondicionCompra' => 'pk',
            'descripcion' => 'text',
            'generaFacturaCredito' => 'float',
            'porcentajeTotalFacturado' => 'float',
            'cantidadCuotas' => 'int',
            'aVencerEnDias' => 'int',
            'cantidadDiasMeses' => 'int',
            'unidadCantidad' => 'string',
            ));
	}

	public function down()
	{
		$this->dropTable('condicionesCompra');
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