<?php

class m111107_231258_triggerORdenes2 extends CDbMigration
{
	public function up()
	{ 
		$sql="DROP trigger ordenes_ingresa;";
   $this->execute($sql);
	$sql="CREATE TRIGGER ordenes_ingresa AFTER INSERT ON ordenesTrabajo 
   FOR EACH ROW
   INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, DATE_ADD(NOW(),INTERVAL 2 DAY) , 'insert','ordenesTrabajo',NEW.idOrdenTrabajo );";
   $this->execute($sql);
   
   }

	public function down()
	{
		echo "m111107_231258_triggerORdenes2 does not support migration down.\n";
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