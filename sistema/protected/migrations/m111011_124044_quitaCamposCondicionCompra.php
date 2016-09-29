<?php

class m111011_124044_quitaCamposCondicionCompra extends CDbMigration
{
	public function up()
	{
//		$this->dropColumn('condicionesCompra','porcentajeTotalFacturado');
//		$this->dropColumn('condicionesCompra','cantidadCuotas');
//		$this->dropColumn('condicionesCompra','aVencerEnDias');
//		$this->dropColumn('condicionesCompra','cantidadDiasMeses');
//		$this->dropColumn('condicionesCompra','unidadCantidad');
	}

	public function down()
	{
		echo "m111011_124044_quitaCamposCondicionCompra does not support migration down.\n";
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