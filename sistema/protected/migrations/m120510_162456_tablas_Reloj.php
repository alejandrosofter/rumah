<?php

class m120510_162456_tablas_Reloj extends CDbMigration
{
	public function up()
	{
		
		
//		$this->createTable('reloj_empladoTarjetas', array(
//            'idEmpleadoTarjeta' => 'pk',
//            'idEmpleado' => 'string',
//            'idTarjeta' => 'string',
//         	'fechaTarjeta' => 'date',
//        ));
          $this->createTable('reloj_Feriados', array(
            'idFeriado' => 'pk',
            'fechaFeriado' => 'date',
            'comentarioFeriado' => 'string',
        ));
         $this->createTable('reloj_horaDiaEmpleados', array(
            'idHoraDiaEmpleado' => 'pk',
            'idEmpleado' => 'string',
            'fechaDia' => 'date',
         	'estadoFecha' => 'string',
         	'comentario' => 'string',
         	'entradaUno' => 'string',
         	'salidaUno' => 'string',
         	'entradaDos' => 'string',
         	'salidaDos' => 'string',
         	'entradaTres' => 'string',
         	'salidaTres' => 'string',
         	'modificacion' => 'string',
        ));
         $this->createTable('reloj_horaEmpleados', array(
            'idHora' => 'pk',
            'idEmpleado' => 'string',
            'justificado' => 'string',
         	'estadoHora' => 'string',
         	'fechaHoraTrabajo' => 'date',
         	'entradaSalida' => 'string',
         	'comentarioHora' => 'string',
        ));
         $this->createTable('reloj_Paros', array(
            'idParo' => 'pk',
            'fechaParo' => 'date',
            'comentarioParo' => 'string',
        ));
         $this->createTable('reloj_Sucursales', array(
            'idSucursal' => 'pk',
            'nombreSucursal' => 'string',
            'direccionSucursal' => 'string',
         	'telefonoSucursal' => 'string',
         	
        ));
         $this->createTable('reloj_tipoTurnos', array(
            'idTipoTurno' => 'pk',
            'nombreTurno' => 'string',
        ));
         $this->createTable('reloj_Turnos', array(
            'idTurno' => 'pk',
            'idTipoTurno' => 'string',
            'ingresoInicio' => 'string',
         	'salidaInicio' => 'string',
         	'ingresoRegreso' => 'string',
         	'salidaRegreso' => 'string',
         	'semana' => 'string',
         	'diaNombre' => 'string',
         	'horas' => 'string',
         	'horas50' => 'string',
         	'horas100' => 'string',
         	'horas50Noct' => 'string',
         	'horas100Noct' => 'string',        	
         	'idCategoria' => 'string',
        )); 
	}

	public function down()
	{
		echo "m120510_162456_tablas_Reloj does not support migration down.\n";
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