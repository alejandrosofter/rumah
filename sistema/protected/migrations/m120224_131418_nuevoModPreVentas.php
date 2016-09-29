<?php

class m120224_131418_nuevoModPreVentas extends CDbMigration
{
	public function up()
	{
            $this->createTable('preVentas_empresas', array('idPreventaEmpresa' => 'pk',
                'fecha' => 'dateTime',
            'empresa' => 'string',
            'telefono' => 'string',
                'email' => 'string',
                'estado' => 'string',
                'idUsuario' => 'int',
                'interes' => 'string',

            ));
            $this->createTable('preVentas_estados', array('idPreventaEmpresaEstado' => 'pk',
            'fecha' => 'dateTime',
            'idUsuario' => 'int',
                'comentario' => 'text',
                'estado' => 'string',

            ));
            $this->createTable('preVentas_nombreEstados', array('idPreventaEmpresaNombreEstado' => 'pk',
            'nombreEstado' => 'string',

            ));
	}
        

	public function down()
	{
		echo "m120224_131418_nuevoModPreVentas does not support migration down.\n";
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