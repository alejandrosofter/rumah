<?php

class m111012_145851_facturassalientesvencimientos extends CDbMigration
{
	public function up()
	{
//				$this->createTable('facturasSalientesVencimiento', array('idFacturaVencimiento' => 'pk',
//            'idFacturaSaliente' => 'int',
//		 	'fechaVencimiento' => 'date',
//            'estado' => 'string',
//		'importeFacturaSaliente' => 'float',
//            ));
//            
    $sql="ALTER TABLE  `facturasSalientesVencimiento` ENGINE = INNODB; ";
		$this->execute($sql);
		
		$this->execute($sql);
		$sql="ALTER TABLE  `ordenesCobroFactuas` ADD INDEX (  `idFacturaVencimiento` ); ";
		$this->execute($sql);
		$sql="ALTER TABLE  `ordenesCobroFactuas` ADD FOREIGN KEY (  `idFacturaVencimiento` ) REFERENCES  `gfoxV3`.`facturasSalientesVencimiento` (
`idFacturaVencimiento`
) ON DELETE CASCADE ON UPDATE CASCADE ; ";
$this->execute($sql);


$sql="ALTER TABLE `settings` CHANGE `value` `value` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;" ;
$this->execute($sql);
$sql="RENAME TABLE `gfoxV3`.`ordenesCobroFactuas` TO `gfoxV3`.`ordenesCobroFacturas` ;";
$this->execute($sql);
	}

	public function down()
	{
		echo "m111012_145851_facturassalientesvencimientos does not support migration down.\n";
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