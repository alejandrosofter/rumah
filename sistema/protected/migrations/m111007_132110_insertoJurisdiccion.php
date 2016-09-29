<?php

class m111007_132110_insertoJurisdiccion extends CDbMigration
{
	public function up()
	{
		$this->insert('acciones', array(
   
   'nombre' => 'Nueva Jurisdiccion',
   'direccion' => 'index.php?r=juridicciones/create',
   'tipo' => 'configuracion',
   'descripcion' => 'Ingresar nueva jurisdiccion',

));




$this->insert('acciones', array(
   
   'nombre' => 'Ver Juridisiones',
   'direccion' => 'index.php?r=juridicciones/index',
   'tipo' => 'configuracion',
   'descripcion' => 'Listado de jurisdiccion',

));
		
	}

	public function down()
	{
		echo "m111007_132110_insertoJurisdiccion does not support migration down.\n";
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