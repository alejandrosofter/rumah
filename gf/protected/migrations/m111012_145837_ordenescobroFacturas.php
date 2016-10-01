<?php

class m111012_145837_ordenescobroFacturas extends CDbMigration
{
	public function up()
	{
		$this->createTable('ordenesCobroFactuas', array('idOrdenCobroFacturas' => 'pk',
            'idOrdenCobro' => 'int',
		 	'idFacturaSaliente' => 'int',
            'idFacturaVencimiento' => 'int',
		'importeCobroFactura' => 'float',
            ));
            
            $sql="ALTER TABLE  `ordenesCobro` ENGINE = INNODB; ";
		$this->execute($sql);
		$sql="ALTER TABLE  `ordenesCobroFactuas` ENGINE = INNODB; ";
		$this->execute($sql);
		$sql="ALTER TABLE  `ordenesCobroFactuas` ADD INDEX (  `idOrdenCobro` ); ";
		$this->execute($sql);
		$sql="ALTER TABLE  `ordenesCobroFactuas` ADD FOREIGN KEY (  `idOrdenCobro` ) REFERENCES  `gfoxV3`.`ordenesCobro` (
`idOrdenCobro`
) ON DELETE CASCADE ON UPDATE CASCADE ; ";
$this->execute($sql);





	}

	public function down()
	{
		echo "m111012_145837_ordenescobroFacturas does not support migration down.\n";
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