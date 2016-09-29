<?php

class m111013_142741_parcheFacturasEntrantesEstado extends CDbMigration
{
	public function up()
	{
		$sql="update `facturasEntrantes` set estado='PEND' where (estado='Para Pagar');

update `facturasEntrantes` set estado='PEND' where (estado='Debiendo');

update `facturasEntrantes` set estado='CANC' where (estado='Pagada');

update `facturasEntrantes` set estado='CANC' where (estado='Pagado');

update `facturasEntrantes` set estado='CANC' where (estado='');";
$this->execute($sql);
	}

	public function down()
	{
		echo "m111013_142741_parcheFacturasEntrantesEstado does not support migration down.\n";
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