<?php

class m111107_230410_triggerORdenes extends CDbMigration
{
	public function up()
	{
		$sql="CREATE TRIGGER ordenes_ingresa AFTER INSERT ON ordenesTrabajo 
   FOR EACH ROW
   INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, DATE_ADD(NOW(),INTERVAL 2 DAY) , 'insert','ordenesTrabajo',NEW.idOrdenTrabajo );";
   $this->execute($sql);
	}

	public function down()
	{
		echo "m111107_230410_triggerORdenes does not support migration down.\n";
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