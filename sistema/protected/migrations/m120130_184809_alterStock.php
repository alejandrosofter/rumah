<?php

class m120130_184809_alterStock extends CDbMigration
{
	public function up()
	{
            $sql="ALTER TABLE  `stock` CHANGE  `nombre`  `nombre` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT  ''";
            $this->execute($sql);
	}

	public function down()
	{
		echo "m120130_184809_alterStock does not support migration down.\n";
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