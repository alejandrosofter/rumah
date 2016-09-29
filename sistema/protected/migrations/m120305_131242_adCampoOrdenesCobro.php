<?php

class m120305_131242_adCampoOrdenesCobro extends CDbMigration
{
	public function up()
	{
             $this->addColumn('ordenesCobro', 'estadoOrden', 'string');
	}

	public function down()
	{
		echo "m120305_131242_adCampoOrdenesCobro does not support migration down.\n";
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