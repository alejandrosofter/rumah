<?php

class m111003_190506_clientesupcaseapellido extends CDbMigration
{
	public function up()
	{
		$sql="UPDATE clientes SET `apellido`=UPPER(`apellido`), `razonSocial`=UPPER(`razonSocial`)";
		$this->execute($sql);
	}

	public function down()
	{
		echo "m111003_190506_clientesupcaseapellido does not support migration down.\n";
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