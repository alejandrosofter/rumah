<?php

class m120321_180604_addPreVenta extends CDbMigration
{
	public function up()
	{
             $this->addColumn('preVentas_empresas', 'contacto', 'string');
             $this->addColumn('preVentas_empresas', 'responsable', 'string');
	}

	public function down()
	{
		echo "m120321_180604_addPreVenta does not support migration down.\n";
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