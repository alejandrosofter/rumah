<?php

class m111121_192819_proveedores_addCampojuris extends CDbMigration
{
	public function up()
	{
		$this->insert('settings',array('category'=>'ventas'
		,'key'=>'IDCLIENTE_CONSUMIDORFINAL'
		,'value'=>'0'));
		
		$this->insert('settings',array('category'=>'ventas'
		,'key'=>'ID_CONTADO'
		,'value'=>'1'));
		
		$this->insert('clientes',array('idCliente'=>'0'
		,'razonSocial'=>'CONS. FINAL'
		,'email'=>''));
	}

	public function down()
	{
		echo "m111121_192819_proveedores_addCampojuris does not support migration down.\n";
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