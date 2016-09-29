<?php

class m111011_143906_agregarTablaOrdenesPagoItems extends CDbMigration
{
	public function up()
	{
		$this->createTable('ordenesPago_vencimientos', array('idOrdenPagoVencimiento' => 'pk',
            'idFacturaEntrante' => 'int',
            'idFacturaEntranteVencimiento' => 'int',
            'importe' => 'float',
            ));
	}

	public function down()
	{
		echo "m111011_143906_agregarTablaOrdenesPagoItems does not support migration down.\n";
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