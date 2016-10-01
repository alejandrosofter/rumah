<?php

class m120302_200536_adCampoItemsFactura extends CDbMigration
{
	public function up()
	{
            $this->addColumn('itemsFacturaSaliente', 'idOrdenTrabajo', 'int');
	}

	public function down()
	{
		echo "m120302_200536_adCampoItemsFactura does not support migration down.\n";
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