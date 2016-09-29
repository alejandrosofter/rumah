<?php

class m111012_123656_clavesVEncimientos extends CDbMigration
{
	public function up()
	{
		$sql="ALTER TABLE  `facturasEntrantes_vencimientos` ENGINE = INNODB; ";
		$this->execute($sql);
		$sql="ALTER TABLE  `facturasEntrantes_vencimientos` ADD INDEX (  `idFacturaEntrante` ); ";
		$this->execute($sql);
		$sql="ALTER TABLE  `facturasEntrantes_vencimientos` ADD FOREIGN KEY (  `idFacturaEntrante` ) REFERENCES  `gfoxV3`.`facturasEntrantes` (
`idFacturaEntrante`
) ON DELETE CASCADE ON UPDATE CASCADE ; ";
$this->execute($sql);
	}

	public function down()
	{
		echo "m111012_123656_clavesVEncimientos does not support migration down.\n";
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