<?php

class m111003_154519_accionesModifica extends CDbMigration
{
	public function up()
	{
		$this->addColumn('acciones', 'tipo', 'varchar(255)');
		$this->addColumn('acciones', 'descripcion', 'text');
		$this->addColumn('acciones', 'imagen', 'varchar(255)');
	}

	public function down()
	{
		$this->dropColumn('acciones', 'tipo');
		$this->dropColumn('acciones', 'descripcion');
		$this->dropColumn('acciones', 'imagen');
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