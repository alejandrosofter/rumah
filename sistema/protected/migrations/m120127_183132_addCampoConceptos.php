<?php

class m120127_183132_addCampoConceptos extends CDbMigration
{
	public function up()
	{
            $this->addColumn('facturasEntrantes_concepto', 'detalle', 'text');
	}

	public function down()
	{
		echo "m120127_183132_addCampoConceptos does not support migration down.\n";
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