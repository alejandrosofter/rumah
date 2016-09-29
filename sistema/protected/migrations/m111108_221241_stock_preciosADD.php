<?php

class m111108_221241_stock_preciosADD extends CDbMigration
{
	public function up()
	{
		$this->addColumn('stock_precios', 'idElemento', 'int');
	}

	public function down()
	{
		echo "m111108_221241_stock_preciosADD does not support migration down.\n";
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