<?php

class m111028_162247_alertasUsuarios_crear extends CDbMigration
{
	public function up()
	{
		$this->createTable('alertas_usuario', array('idAlertaUsuario' => 'pk',
            'idAlerta' => 'int',
            'idUsuario' => 'int',

            ));
        $sql="ALTER TABLE  `alertas_usuario` ENGINE = INNODB; ";
		$this->execute($sql);
		$sql="ALTER TABLE  `alertas` ENGINE = INNODB; ";
		$this->execute($sql);
		$sql="ALTER TABLE  `alertas_usuario` ADD INDEX (  `idAlerta` ); ";
		$this->execute($sql);
		$sql="ALTER TABLE  `alertas_usuario` ADD FOREIGN KEY (  `idAlerta` ) REFERENCES  `gfoxV3`.`alertas` (
`idAlerta`
) ON DELETE CASCADE ON UPDATE CASCADE ; ";
$this->execute($sql);
	}

	public function down()
	{
		echo "m111028_162247_alertasUsuarios_crear does not support migration down.\n";
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