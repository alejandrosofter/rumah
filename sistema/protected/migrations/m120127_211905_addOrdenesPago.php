<?php

class m120127_211905_addOrdenesPago extends CDbMigration
{
	public function up()
	{
            $this->addColumn('ordenesPago', 'idFormaPago', 'int');
	}

	public function down()
	{
		echo "m120127_211905_addOrdenesPago does not support migration down.\n";
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