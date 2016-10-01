<?php

class m111004_133444_nuevosCamposSettings extends CDbMigration
{
	public function up()
	{
		$sql="INSERT INTO  `settings` (
`id` ,
`category` ,
`key` ,
`value`
)
VALUES (
NULL ,  'system',  'VERSION',  '0'
), (
NULL ,  'system',  'BASE',  '0'
);";
		$this->execute($sql);
	}

	public function down()
	{
		echo "m111004_133444_nuevosCamposSettings does not support migration down.\n";
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