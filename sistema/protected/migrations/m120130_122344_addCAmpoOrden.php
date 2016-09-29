<?php

class m120130_122344_addCAmpoOrden extends CDbMigration
{
	public function up()
	{
            $this->addColumn('ordenesCobro', 'idFormaPago', 'int');
	}

	public function down()
	{
		echo "m120130_122344_addCAmpoOrden does not support migration down.\n";
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