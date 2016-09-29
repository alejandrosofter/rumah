<?php

class m120124_135226_addCampoProveedor extends CDbMigration
{
	public function up()
	{
            $this->addColumn('proveedores', 'nombreFantasia', 'string');
	}

	public function down()
	{
		echo "m120124_135226_addCampoProveedor does not support migration down.\n";
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