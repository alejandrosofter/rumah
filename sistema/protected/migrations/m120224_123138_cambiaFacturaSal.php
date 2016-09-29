<?php

class m120224_123138_cambiaFacturaSal extends CDbMigration
{
	public function up()
	{
            $sql="ALTER TABLE  `facturasSalientes` CHANGE  `fecha`  `fecha` DATETIME NOT NULL";
            $this->execute($sql);
	}

	public function down()
	{
		echo "m120224_123138_cambiaFacturaSal does not support migration down.\n";
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