<?php

class m120319_175012_addControtoCampo extends CDbMigration
{
	public function up()
	{
            $this->addColumn('ordenesTrabajo_estados', 'enviaMail', 'int');
            $this->addColumn('rutinas_estados_ordenesTrabajo', 'enviaMail', 'int');
            
            $this->addColumn('mantenimientosEmpresas', 'nombreContrato', 'string');
            $this->createTable('mantenimientosEmpresas_factura', array('idContratoFactura' => 'pk',
            'idFactura' => 'int',
            'idMantenimiento' => 'int',
            'fecha' => 'date'));
            $this->createTable('ordenesTrabajo_cambioEstado', array('idOrdenCambioEstado' => 'pk',
            'idOrdenTrabajo' => 'int',
            'estado' => 'string',
            'fecha' => 'date'));
	}

	public function down()
	{
		echo "m120319_175012_addControtoCampo does not support migration down.\n";
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