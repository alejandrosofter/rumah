<?php

class m120126_164059_addCampoFactCompra extends CDbMigration
{
	public function up()
	{
            $this->addColumn('facturasEntrantes', 'importeDescuento105', 'float');
	}

	public function down()
	{
		echo "m120126_164059_addCampoFactCompra does not support migration down.\n";
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