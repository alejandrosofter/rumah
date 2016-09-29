<?php

class m120308_130018_addCamposContrato extends CDbMigration
{
	public function up()
	{
            $this->addColumn('mantenimientosEmpresas', 'cantidadDiasFacturar', 'int');
            $this->addColumn('mantenimientosEmpresas', 'fechaFin', 'date');
            $this->addColumn('mantenimientosEmpresas', 'idRutinaEscucha', 'int');
            $this->addColumn('mantenimientosEmpresas', 'cantidadEscucha', 'int');
            $this->addColumn('mantenimientosEmpresas', 'idRutinaEscucha2', 'int');
            $this->addColumn('mantenimientosEmpresas', 'cantidadEscucha2', 'int');
            $this->addColumn('mantenimientosEmpresas', 'idRutinaEscucha3', 'int');
            $this->addColumn('mantenimientosEmpresas', 'cantidadEscucha3', 'int');
	}

	public function down()
	{
		echo "m120308_130018_addCamposContrato does not support migration down.\n";
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