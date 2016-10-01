<?php

class m111013_131746_relacionesOrdenesPago extends CDbMigration
{
	public function up()
	{
		$sql="ALTER TABLE  `ordenesPago` ENGINE = INNODB; ";
		$this->execute($sql);
		$sql="ALTER TABLE  `ordenesPago_vencimientos` ENGINE = INNODB; ";
		$this->execute($sql);
		$sql="ALTER TABLE  `ordenesPago_vencimientos` ADD INDEX (  `idOrdenPago` ); ";
		$this->execute($sql);
		$sql="ALTER TABLE  `ordenesPago_vencimientos` ADD FOREIGN KEY (  `idOrdenPago` ) REFERENCES  `gfoxV3`.`ordenesPago` (
`idOrdenPago`
) ON DELETE CASCADE ON UPDATE CASCADE ; ";
$this->execute($sql);
	}

	public function down()
	{
		echo "m111013_131746_relacionesOrdenesPago does not support migration down.\n";
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