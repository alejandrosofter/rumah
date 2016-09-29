<?php

class m111004_124447_ripeorproveedor extends CDbMigration
{
	public function up()
	{
		
		$sql="UPDATE proveedores SET `nombre`=UPPER(`nombre`)";
		$this->execute($sql);
	}

	public function down()
	{
		echo "m111004_124447_ripeorproveedor does not support migration down.\n";
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