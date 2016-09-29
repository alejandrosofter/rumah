<?php

class m111019_160234_facturasEntrantes_defaultImportes extends CDbMigration
{
	public function up()
	{
		$sql="ALTER TABLE  `facturasEntrantes` CHANGE  `importeDescuentos`  `importeDescuentos` FLOAT NULL DEFAULT  '0',
CHANGE  `importeFlete`  `importeFlete` FLOAT NULL DEFAULT  '0',
CHANGE  `importeRecargos`  `importeRecargos` FLOAT NULL DEFAULT  '0',
CHANGE  `importeImpuestos`  `importeImpuestos` FLOAT NULL DEFAULT  '0'";
$this->execute($sql);

$sql="update `facturasEntrantes` set importeDescuentos=0, importeFlete=0, importeRecargos=0,importeImpuestos=0 ;";
$this->execute($sql);
	}

	public function down()
	{
		echo "m111019_160234_facturasEntrantes_defaultImportes does not support migration down.\n";
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