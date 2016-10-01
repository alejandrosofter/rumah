<?php

class m111125_143826_addImpresion extends CDbMigration
{
	public function up()
	{
		$this->insert('settings',array('category'=>'impresiones'
		,'key'=>'IMPRESION_FACTURASCOMPRA'
		,'value'=>'%items'));
	}

	public function down()
	{
		echo "m111125_143826_addImpresion does not support migration down.\n";
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