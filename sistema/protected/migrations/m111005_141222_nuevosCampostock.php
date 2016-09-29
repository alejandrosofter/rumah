<?php

class m111005_141222_nuevosCampostock extends CDbMigration
{
	public function up()
	{
		$this->addColumn('stock', 'codigoProducto', 'varchar(255)');
		$this->addColumn('stock', 'unidadMedida', 'varchar(255)');
	}

	public function down()
	{
		$this->dropColumn('stock', 'unidadMedida');
		$this->dropColumn('stock', 'codigoProducto');
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