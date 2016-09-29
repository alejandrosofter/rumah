<?php

class m111116_150319_presupuestosItems_agregarCampo extends CDbMigration
{
	public function up()
	{
		$this->addColumn('presupuestoItems', 'bonificado', 'float');
	}

	public function down()
	{
		echo "m111116_150319_presupuestosItems_agregarCampo does not support migration down.\n";
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