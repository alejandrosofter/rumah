<?php

class m111019_155202_facturasEntrantes_agregaCampos extends CDbMigration
{
	public function up()
	{
		$this->addColumn('facturasEntrantes', 'importeDescuentos', 'float');
		$this->addColumn('facturasEntrantes', 'importeFlete', 'float');
		$this->addColumn('facturasEntrantes', 'importeRecargos', 'float');
		$this->addColumn('facturasEntrantes', 'importeImpuestos', 'float');
	}

	public function down()
	{
		echo "m111019_155202_facturasEntrantes_agregaCampos does not support migration down.\n";
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