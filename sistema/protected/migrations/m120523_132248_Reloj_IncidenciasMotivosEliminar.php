<?php

class m120523_132248_Reloj_IncidenciasMotivosEliminar extends CDbMigration
{
	// No es significativo el nombre de la tabla. 
	// Fue redactado por error
	public function up()
	{		
		$this->createTable('reloj_Motivos', array(
            'id' => 'pk',
            'nombre' => 'string'
			));
	}

	public function down()
	{
		echo "m120523_132248_Reloj_IncidenciasMotivosEliminar does not support migration down.\n";
		return false;
	}
}