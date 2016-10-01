<?php

class m111028_193244_alertas_addCampos extends CDbMigration
{
	public function up()
	{
		$this->addColumn('alertas', 'area', 'string');
		$this->addColumn('alertas', 'fechaInicioAlerta', 'date');
	}

	public function down()
	{
		echo "m111028_193244_alertas_addCampos does not support migration down.\n";
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