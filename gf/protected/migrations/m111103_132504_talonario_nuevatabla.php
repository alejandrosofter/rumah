<?php

class m111103_132504_talonario_nuevatabla extends CDbMigration
{
public function up()
	{
		$this->createTable('talonario', array('idTalonario' => 'pk',
            'idPuntoVenta' => 'int(8)  NOT NULL',
            'desdeNumero' => 'int(8)',
            'hastaNumero' => 'int(8)  NOT NULL',
            'proximo' => 'int(8)  NOT NULL',
            'letraTalonario' => 'string',
            'tipoTalonario' => 'string',
            'numeroSerie' => 'int(6) NOT NULL',
            ));
	}

	public function down()
	{
		echo "m111103_132504_talonario_nuevatabla does not support migration down.\n";
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