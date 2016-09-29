<?php

class m111121_133018_proveedores_addCampojuris extends CDbMigration
{
	public function up()
	{
//		$this->addColumn('proveedores', 'idJuridiccion', 'int');
//		$this->addColumn('proveedores', 'localidad', 'varchar(255)');
//		$this->addColumn('proveedores', 'nro', 'varchar(255)');
//		$this->addColumn('proveedores', 'codigoProveedor', 'varchar(255)');
//		$this->addColumn('proveedores', 'letraHabitual', 'varchar(255)');
	}

	public function down()
	{
		echo "m111121_133018_proveedores_addCampojuris does not support migration down.\n";
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