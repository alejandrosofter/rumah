<?php

class m111007_140902_unicocuitproveedor extends CDbMigration
{
	public function up()
	{
//		$sql="ALTER TABLE `proveedores` ADD UNIQUE (
//`cuit`
//)";
//		$this->execute($sql);
	}

	public function down()
	{
		echo "m111007_140902_unicocuitproveedor does not support migration down.\n";
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