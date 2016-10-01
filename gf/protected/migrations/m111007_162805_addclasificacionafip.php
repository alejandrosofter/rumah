<?php

class m111007_162805_addclasificacionafip extends CDbMigration
{
	public function up()
	{
		$this->insert('acciones', array(
   
   'nombre' => 'Nueva Clasificacion AFIP',
   'direccion' => 'index.php?r=clasificacionAfip/create',
   'tipo' => 'configuracion',
   'descripcion' => 'Ingresar nueva Clasificacion',

));




$this->insert('acciones', array(
   
   'nombre' => 'Ver Clasificacion AFIP',
   'direccion' => 'index.php?r=clasificacionAfip/index',
   'tipo' => 'configuracion',
   'descripcion' => 'Listado de Clasificacion',

));
	}

	public function down()
	{
		echo "m111007_162805_addclasificacionafip does not support migration down.\n";
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