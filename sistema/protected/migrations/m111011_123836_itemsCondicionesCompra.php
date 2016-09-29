<?php

class m111011_123836_itemsCondicionesCompra extends CDbMigration
{
	public function up()
	{
		$this->createTable('condicionesCompra_items', array('idCondicionCompraItem' => 'pk',
            'idCondicionCompra' => 'int',
 
            'porcentajeTotalFacturado' => 'float',
            'cantidadCuotas' => 'int',
            'aVencerEnDias' => 'int',
            'cantidadDiasMeses' => 'int',
            'unidadCantidad' => 'string',
            ));
	}

	public function down()
	{
		$this->dropTable('condicionesCompra_items');
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