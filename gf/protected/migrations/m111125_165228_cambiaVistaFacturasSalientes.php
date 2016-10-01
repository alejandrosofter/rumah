<?php

class m111125_165228_cambiaVistaFacturasSalientes extends CDbMigration
{
	public function up()
	{
		$sql="DROP VIEW `facturasSalientes_view`";
		$this->execute($sql);
		
		$sql="CREATE VIEW facturasSalientes_view as (SELECT t.*,SUM(IF(itemsFacturaSaliente.porcentajeIva='21',
							itemsFacturaSaliente.importeItem*itemsFacturaSaliente.cantidad,0)) as iva21,
							SUM(IF(itemsFacturaSaliente.porcentajeIva='10.5',
							itemsFacturaSaliente.importeItem*itemsFacturaSaliente.cantidad,0)) as iva105,
							(SELECT SUM(pagos.importeDinero) 
							FROM pagosFactura LEFT JOIN pagos on pagos.idPago = pagosFactura.idPago 
							where pagosFactura.idFacturaSaliente=t.idFacturaSaliente) as pagos,
							
							(
							(
							SUM(itemsFacturaSaliente.importeItem*itemsFacturaSaliente.cantidad)
							)
							+
							IF((
							SUM(itemsFacturaSaliente.importeItem*itemsFacturaSaliente.cantidad)
							* condicionesVentaItems.porcentajeInteres/100
							) is NULL,0,(
							SUM(itemsFacturaSaliente.importeItem*itemsFacturaSaliente.cantidad)
							* condicionesVentaItems.porcentajeInteres/100
							))
							)as importeFactura,
							IF(clientes.tipoCliente='Empresa',clientes.razonSocial,
							CONCAT(clientes.apellido,', ',clientes.nombre)) as cliente from facturasSalientes t
									INNER JOIN clientes on clientes.idCliente = t.idCliente 
		LEFT JOIN itemsFacturaSaliente on itemsFacturaSaliente.idFacturaSaliente = t.idFacturaSaliente 
		 LEFT JOIN condicionesVentaItems on (t.idCondicionVenta = condicionesVentaItems.idCondicionVenta) 
		 		GROUP BY itemsFacturaSaliente.idFacturaSaliente,t.idFacturaSaliente)";
		$this->execute($sql);
	}

	public function down()
	{
		echo "m111125_165228_cambiaVistaFacturasSalientes does not support migration down.\n";
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