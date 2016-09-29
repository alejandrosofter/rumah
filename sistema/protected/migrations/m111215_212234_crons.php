<?php

class m111215_212234_crons extends CDbMigration
{
	public function up()
	{
            $this->createTable('crons', array('idCron' => 'pk',
            'minutos' => 'string',
            'horas' => 'text',
            'dias' => 'string',
            'meses' => 'string',
            'diasSemana' => 'string',
            'script' => 'string',
                'parametros' => 'string',
                'nombre' => 'string',
                  'descripcion' => 'string',
            ));
	}

	public function down()
	{
		echo "m111215_212234_crons does not support migration down.\n";
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