<?php

class m111018_182336_nuevasAccionesPRecios2 extends CDbMigration
{
	public function up()
	{
		$sql="UPDATE  `gfoxV3`.`acciones` SET  `tipo` =  'productos',
`subTipo` =  'precios' WHERE  `acciones`.`idAccion` =21;";
$this->execute($sql);
	}

	public function down()
	{
		echo "m111018_182336_nuevasAccionesPRecios2 does not support migration down.\n";
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