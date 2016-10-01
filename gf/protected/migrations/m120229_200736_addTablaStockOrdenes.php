<?php

class m120229_200736_addTablaStockOrdenes extends CDbMigration
{
	public function up()
	{
            $this->createTable('ordenesTrabajo_stock', array('idStockOrden' => 'pk',
            'idStock' => 'int',
            'idOrdenTrabajo' => 'int',
            'nombreStock' => 'string',
            'porcentajeIva' => 'float',
            'importe' => 'float',
            'cantidad' => 'float'));
	}

	public function down()
	{
		echo "m120229_200736_addTablaStockOrdenes does not support migration down.\n";
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