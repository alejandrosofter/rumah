<?php

class m120301_184547_addTablaRecursoStockOrdenes extends CDbMigration
{
	public function up()
	{
//             $this->addColumn('recursos_ordenesTrabajo', 'idStock', 'int');
//             
//             $this->createTable('ordenesTrabajo_recursos', array('idRecursoOrden' => 'pk',
//            'idOrdenTrabajo' => 'int',
//            'idRecurso' => 'int',
//            'cantidad' => 'float',
//            'fechaInicio' => 'date',
//            'fechaFin' => 'date',));
	}

	public function down()
	{
		echo "m120301_184547_addTablaRecursoStockOrdenes does not support migration down.\n";
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