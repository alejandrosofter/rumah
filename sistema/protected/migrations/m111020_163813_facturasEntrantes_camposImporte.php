<?php

class m111020_163813_facturasEntrantes_camposImporte extends CDbMigration
{
	public function up()
	{
		$sql="ALTER TABLE  `facturasEntrantes` CHANGE  `importeDescuentos`  `importeDescuentos` FLOAT NOT NULL DEFAULT  '0',
CHANGE  `importeFlete`  `importeFlete` FLOAT NOT NULL DEFAULT  '0',
CHANGE  `importeRecargos`  `importeRecargos` FLOAT NOT NULL DEFAULT  '0',
CHANGE  `importeImpuestos`  `importeImpuestos` FLOAT NOT NULL DEFAULT  '0'";
$this->execute($sql);
	}

	public function down()
	{
		echo "m111020_163813_facturasEntrantes_camposImporte does not support migration down.\n";
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