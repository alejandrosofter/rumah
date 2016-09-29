<?php

class m111011_143848_agregarTablaOrdenesPago extends CDbMigration
{
	public function up()
	{
		$this->createTable('ordenesPago', array('idOrdenPago' => 'pk',
            'fechaOrden' => 'date',
            'idProveedor' => 'int',
            'estado' => 'string',
            'pagoAcuenta' => 'float',
            ));
	}

	public function down()
	{
		$this->dropTable('ordenesPago');
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