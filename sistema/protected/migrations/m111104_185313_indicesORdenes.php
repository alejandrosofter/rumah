<?php

class m111104_185313_indicesORdenes extends CDbMigration
{
	public function up()
	{
		$sql="ALTER TABLE  `ordenesPago_vencimientos` ADD INDEX (  `idFacturaEntrante` );";
		$this->execute($sql);
		
		$sql="ALTER TABLE  `ordenesPago_vencimientos` ADD FOREIGN KEY (  `idFacturaEntrante` ) REFERENCES  `gfoxV3`.`facturasEntrantes` (
`idFacturaEntrante`
) ON DELETE CASCADE ;";
		$this->execute($sql);
	}

	public function down()
	{
		echo "m111104_185313_indicesORdenes does not support migration down.\n";
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