<?php

class m120228_161953_tablaRecursos extends CDbMigration
{
	public function up()
	{
            $this->createTable('recursos_ordenesTrabajo', array('idOrdenTrabajoRecurso' => 'pk',
                'idTipoRecurso' => 'int',
            'nombre' => 'string',
            'descripcion' => 'string'));
            
            $this->addColumn('ordenesTrabajo', 'idRutina', 'int');
            
            $this->createTable('ordenesTrabajo_recursos', array('idOrdenIdRecurso' => 'pk',
                'idOrdenTrabajo' => 'int',
            'idRecurso' => 'int'));
            
            $this->createTable('recursos_tipoRecursos_ordenesTrabajo', array('idOrdenTrabajoTipoRecurso' => 'pk',
              
            'nombreTipoRecurso' => 'string'
                ));
            
            $this->createTable('rutinas_ordenesTrabajo', array('idOrdenTrabajoRutina' => 'pk',
            
                'nombreRutina' => 'string',
                'esFacturable' => 'int',
                'esContratada' => 'int',
                'duracionDias' => 'float',
                'prioridad' => 'string',
                'descripcionCliente' => 'string',
                'descripcionEncargado' => 'string',
                'descripcionCliente' => 'string',
                ));
            
            $this->createTable('rutinas_estados_ordenesTrabajo', array('idOrdenTrabajoRutinaEstado' => 'pk',
                'idRutina' => 'int',
                'dias' => 'float',
                'estado' => 'string',
                'detalle' => 'string',
                'nroEstado' => 'int',
                'costoTiempo' => 'float',
                ));
            $this->createTable('rutinas_recursos', array('idRutinaIdRecurso' => 'pk',
                'idRutina' => 'int',
                'idRecurso' => 'int',
                ));
            $this->createTable('rutinas_impresiones', array('idRutinaImpresion' => 'pk',
                'idRutina' => 'int',
                'detalleImpresion' => 'longText',
                'cantidadDefecto' => 'int',
                ));
	}

	public function down()
	{
		echo "m120228_161953_tablaRecursos does not support migration down.\n";
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