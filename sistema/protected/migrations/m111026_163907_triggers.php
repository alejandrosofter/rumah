<?php

class m111026_163907_triggers extends CDbMigration
{
	public function up()
	{
   
   $sql="CREATE TRIGGER clientes_ingresa AFTER INSERT ON clientes 
   FOR EACH ROW
   INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','clientes',NEW.idCliente );";
   $this->execute($sql);
   
   $sql="CREATE TRIGGER facturasEntrantes_ingresa AFTER INSERT ON facturasEntrantes 
   FOR EACH ROW
   INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','facturasEntrantes',NEW.idFacturaEntrante );";
   $this->execute($sql);
   
   $sql="CREATE TRIGGER events_ingresa AFTER INSERT ON events 
   FOR EACH ROW
   INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','events',NEW.id );";
   $this->execute($sql);
   
   $sql="CREATE TRIGGER facturasSalientes_ingresa AFTER INSERT ON facturasSalientes 
   FOR EACH ROW
   INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','facturasSalientes',NEW.idFacturaSaliente );";
   $this->execute($sql);
   
   $sql="CREATE TRIGGER facturasSalientesCorriente_ingresa AFTER INSERT ON facturasSalientesCorriente
   FOR EACH ROW
   INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','facturasSalientesCorriente',NEW.idFacturaSalienteCorriente );";
   $this->execute($sql);
   
   $sql="CREATE TRIGGER inventarios_ingresa AFTER INSERT ON inventarios
   FOR EACH ROW
   INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','inventarios',NEW.idInventario );";
   $this->execute($sql);
   
    $sql="CREATE TRIGGER ordenesCobro_ingresa AFTER INSERT ON ordenesCobro
   FOR EACH ROW
   INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','ordenesCobro',NEW.idOrdenCobro );";
   $this->execute($sql);
   
   $sql="CREATE TRIGGER presupuestos_ingresa AFTER INSERT ON presupuestos
   FOR EACH ROW
   INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','presupuestos',NEW.idPresupuesto );";
   $this->execute($sql);
   
   $sql="CREATE TRIGGER proveedores_ingresa AFTER INSERT ON proveedores
   FOR EACH ROW
   INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','proveedores',NEW.idProveedor );";
   $this->execute($sql);
   
   $sql="CREATE TRIGGER stock_ingresa AFTER INSERT ON stock
   FOR EACH ROW
   INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','stock',NEW.idStock );";
   $this->execute($sql);
   
   $sql="CREATE TRIGGER tareas_ingresa AFTER INSERT ON tareas
   FOR EACH ROW
   INSERT INTO movimientos(idUsuario, fecha, tipoMovimiento, tabla,idElemento )
   VALUES (0, NOW(), 'insert','tareas',NEW.idTarea );";
   $this->execute($sql);
   
   
   

	}

	public function down()
	{
		echo "m111026_163907_triggers does not support migration down.\n";
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