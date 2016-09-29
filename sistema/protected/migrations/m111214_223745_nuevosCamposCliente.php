<?php

class m111214_223745_nuevosCamposCliente extends CDbMigration
{
	public function up()
	{
            $this->addColumn('clientes', 'nombresContactoFinanzas', 'string');
            $this->addColumn('clientes', 'emailContactoFinanzas', 'string');
            $this->addColumn('clientes', 'mobilContactoFinanzas', 'string');
            
            $this->addColumn('clientes', 'nombresContactoMantenimiento', 'string');
            $this->addColumn('clientes', 'emailContactoMantenimiento', 'string');
            $this->addColumn('clientes', 'mobilContactoMantenimiento', 'string');
	}

	public function down()
	{
		echo "m111214_223745_nuevosCamposCliente does not support migration down.\n";
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