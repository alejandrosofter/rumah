<?php

class m111201_161750_agregarPanelUsuario extends CDbMigration
{
	public function up()
	{
		$this->createTable('authItemPanel', array('rol' => 'string',
            'panel' => 'longtext'
            ));
          $sql="ALTER TABLE  `authItemPanel` ADD PRIMARY KEY (  `rol` )";
		$this->execute($sql);
	}

	public function down()
	{
		echo "m111201_161750_agregarPanelUsuario does not support migration down.\n";
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