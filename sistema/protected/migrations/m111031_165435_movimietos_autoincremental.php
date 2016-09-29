<?php

class m111031_165435_movimietos_autoincremental extends CDbMigration
{
	public function up()
	{
		$sql="ALTER TABLE `movimientos` CHANGE `idMovimiento` `idMovimiento` INT( 9 ) NOT NULL AUTO_INCREMENT; ";
		$this->execute($sql);
		 
	}

	public function down()
	{
		echo "m111031_165435_movimietos_autoincremental does not support migration down.\n";
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