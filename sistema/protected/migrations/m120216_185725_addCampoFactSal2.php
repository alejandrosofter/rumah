<?php

class m120216_185725_addCampoFactSal2 extends CDbMigration
{
	public function up()
	{
            $this->addColumn('facturasSalientes', 'interes', 'float');
	}

	public function down()
	{
		echo "m120216_185725_addCampoFactSal2 does not support migration down.\n";
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