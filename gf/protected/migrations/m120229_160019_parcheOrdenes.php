<?php

class m120229_160019_parcheOrdenes extends CDbMigration
{
	public function up()
	{
            $res=OrdenesTrabajo::model()->buscarParche();
            foreach ($res as $key => $value) {
                $orden=OrdenesTrabajo::model()->findByPk($value['idOrdenTrabajo']);
                $orden->estadoOrden=isset($value['estado'])?$value['estado']:'';
                $orden->save();
            }
	}

	public function down()
	{
		echo "m120229_160019_parcheOrdenes does not support migration down.\n";
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