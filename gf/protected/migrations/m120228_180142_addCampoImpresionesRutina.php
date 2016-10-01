<?php

class m120228_180142_addCampoImpresionesRutina extends CDbMigration
{
	public function up()
	{
            $this->addColumn('rutinas_impresiones', 'nombreImpresion', 'string');
	}

	public function down()
	{
		echo "m120228_180142_addCampoImpresionesRutina does not support migration down.\n";
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