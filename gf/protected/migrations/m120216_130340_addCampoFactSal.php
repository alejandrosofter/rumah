<?php

class m120216_130340_addCampoFactSal extends CDbMigration
{
	public function up()
	{
            $this->addColumn('facturasSalientes', 'esFacturaCredito', 'int');
	}

	public function down()
	{
		echo "m120216_130340_addCampoFactSal does not support migration down.\n";
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