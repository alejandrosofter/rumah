<?php

class m120323_135903_tablaRespFactElect extends CDbMigration
{
	public function up()
	{
            $this->createTable('facturasSalientes_respuestaElectronica', array('idFacturaRespuesta' => 'pk',
            'idFacturaSaliente' => 'int',
            'estado' => 'string',
            'cae' => 'string',
            'fechaVence' => 'string',
            'eventos' => 'string',
                'errores' => 'string',));
	}

	public function down()
	{
		echo "m120323_135903_tablaRespFactElect does not support migration down.\n";
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