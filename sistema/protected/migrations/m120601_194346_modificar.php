<?php

class m120601_194346_modificar extends CDbMigration
{
	public function up()
	{
            $sql="ALTER TABLE  `reloj_horaempleados` CHANGE  `fechaHoraTrabajo`  `fechaHoraTrabajo` DATETIME NULL DEFAULT NULL";
            $this->execute($sql);
            
        }

	public function down()
	{
		echo "m120601_194346_modificar does not support migration down.\n";
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