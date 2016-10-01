<?php

class m111115_142901_talonarios_cambiaTipos extends CDbMigration
{
	public function up()
	{
		$sql="ALTER TABLE  `talonario` CHANGE  `desdeNumero`  `desdeNumero` VARCHAR( 8 ) NULL DEFAULT NULL";
		$this->execute($sql);
		$sql="ALTER TABLE  `talonario` CHANGE  `hastaNumero`  `hastaNumero` VARCHAR( 8 ) NULL DEFAULT NULL";
		$this->execute($sql);
		$sql="ALTER TABLE  `talonario` CHANGE  `proximo`  `proximo` VARCHAR( 8 ) NULL DEFAULT NULL";
		$this->execute($sql);
		$sql="ALTER TABLE  `talonario` CHANGE  `numeroSerie`  `numeroSerie` VARCHAR( 6 ) NULL DEFAULT NULL";
		$this->execute($sql);
	}

	public function down()
	{
		echo "m111115_142901_talonarios_cambiaTipos does not support migration down.\n";
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