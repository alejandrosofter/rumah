<?php

class m120504_175745_addTablaVendedores extends CDbMigration
{
	public function up()
	{
            $this->createTable('vendedores', array('idVendedor' => 'pk',
            'nombre' => 'string',
            'apellido' => 'string',
            'telefono' => 'string',
            'nroLegajo' => 'string',
            'porcentajeGanancia' => 'float',
                'fechaInicio' => 'date',));
            $this->addColumn('facturasSalientes', 'idVendedor', 'int');
	}

	public function down()
	{
		echo "m120504_175745_addTablaVendedores does not support migration down.\n";
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