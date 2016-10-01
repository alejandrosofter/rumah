<?php

class m111012_145904_facturassalientes extends CDbMigration
{
	public function up()
	{
		$this->addColumn('facturasSalientes', 'idCondicionVenta', 'int');
		$this->addColumn('facturasSalientes', 'bonificacion', 'float');
		$this->addColumn('facturasSalientes', 'idListaPrecios', 'int');
		
		
		 $sql="ALTER TABLE  `facturasSalientes` ENGINE = INNODB; ";
		$this->execute($sql);
		$sql="ALTER TABLE  `facturasSalientesVencimiento` ADD INDEX (  `idFacturaSaliente` ); ";
		$this->execute($sql);
		$sql="ALTER TABLE  `facturasSalientesVencimiento` ADD FOREIGN KEY (  `idFacturaSaliente` ) REFERENCES  `gfoxV3`.`facturasSalientes` (
`idFacturaSaliente`
) ON DELETE CASCADE ON UPDATE CASCADE ; ";
$this->execute($sql);
            
	}

	public function down()
	{
		echo "m111012_145904_facturassalientes does not support migration down.\n";
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