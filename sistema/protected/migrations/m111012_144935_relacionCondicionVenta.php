<?php

class m111012_144935_relacionCondicionVenta extends CDbMigration
{
	public function up()
	{
		$sql="ALTER TABLE  `condicionesVenta` ENGINE = INNODB; ";
		$this->execute($sql);
		$sql="ALTER TABLE  `condicionesVentaItems` ENGINE = INNODB; ";
		$this->execute($sql);
		$sql="ALTER TABLE  `condicionesVentaItems` ADD INDEX (  `idCondicionVenta` ); ";
		$this->execute($sql);
		$sql="ALTER TABLE  `condicionesVentaItems` ADD FOREIGN KEY (  `idCondicionVenta` ) REFERENCES  `gfoxV3`.`condicionesVenta` (
`idCondicionVenta`
) ON DELETE CASCADE ON UPDATE CASCADE ; ";
$this->execute($sql);
	}

	public function down()
	{
		echo "m111012_144935_relacionCondicionVenta does not support migration down.\n";
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