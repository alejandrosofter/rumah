<?php

class m111011_135441_agregarTablaVencimientosFactEntr extends CDbMigration
{
	public function up()
	{
		$this->createTable('facturasEntrantes_vencimientos', array('idFacturaVencimiento' => 'pk',
            'idFacturaEntrante' => 'int',
            'fechaVencimiento' => 'date',
            'estado' => 'string',
            'importe' => 'float',
            ));
	}

	public function down()
	{
			$this->dropTable('facturasEntrantes_vencimientos');
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