<?php

class m120507_143637_agregarTablaEmpleados extends CDbMigration
{
	public function up()
	{
		$this->createTable('Reloj_empleados', array(
            'idEmpleado' => 'pk',
            'idLegajo' => 'string',
			'nombreEmpleado' => 'string',
			'idCuil' => 'string',
			'FechaNacimiento' => 'date',
			'domicilio' => 'string',
			'telefono' => 'string',
			'fechaIngreso' => 'date',
			'regl' => 'string',
			'notifEmergencia' => 'string',
			'suaf' => 'string',
			'afectacion' => 'string',
			'presentacion' => 'string',
			'obrasocial' => 'string',
			'altaFirmada' => 'string',
			'preocup' => 'string',
			'copiaDNI' => 'string',
			'cuil' => 'string',
			'idsucursal' => 'int',
			'dni' => 'string',
			'idCategoria' => 'int'
        ));
	}

	public function down()
	{
		echo "m120507_143637_agregarTablaEmpleados does not support migration down.\n";
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