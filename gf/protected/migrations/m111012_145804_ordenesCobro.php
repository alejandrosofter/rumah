<?php

class m111012_145804_ordenesCobro extends CDbMigration
{
	public function up()
	{
		
		$this->createTable('ordenesCobro', array('idOrdenCobro' => 'pk',
            'fechaOrdenCobro' => 'date',
		 	'idCliente' => 'int',
            'importeAcuenta' => 'float',
            ));
	}

	public function down()
	{
		echo "m111012_145804_ordenesCobro does not support migration down.\n";
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