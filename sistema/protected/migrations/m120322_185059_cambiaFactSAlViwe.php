<?php

class m120322_185059_cambiaFactSAlViwe extends CDbMigration
{
	public function up()
	{
            $consulta="SELECT t.*,COUNT(itemsFacturaSaliente.idItemsFacturaSaliente) as cantidadItems,clientes.cuit as cuitCliente,clientes.emailContactoFinanzas,clientes.email, clientes.condicionIva as condicionIvaCliente,SUM(IF(itemsFacturaSaliente.porcentajeIva='21',
							itemsFacturaSaliente.importeItem*itemsFacturaSaliente.cantidad,0)) as iva21,
							SUM(IF(itemsFacturaSaliente.porcentajeIva='10.5',
							itemsFacturaSaliente.importeItem*itemsFacturaSaliente.cantidad,0)) as iva105,
							(SELECT SUM(ordenesCobroFacturas.importeCobroFactura) 
							FROM ordenesCobroFacturas 
							where ordenesCobroFacturas.idFacturaSaliente=t.idFacturaSaliente) as pagos,
							
							(
							(
							SUM(itemsFacturaSaliente.importeItem*(IF(itemsFacturaSaliente.porcentajeIva=0,1,(itemsFacturaSaliente.porcentajeIva/100)+1))*itemsFacturaSaliente.cantidad)
							)
							
							)as importeFactura,
							
							
							CONCAT(clientes.razonSocial,' ',clientes.apellido,' ',clientes.nombre) as cliente FROM `facturasSalientes` t 
INNER JOIN clientes on clientes.idCliente = t.idCliente 
		LEFT JOIN itemsFacturaSaliente on itemsFacturaSaliente.idFacturaSaliente = t.idFacturaSaliente 
		 LEFT JOIN condicionesVentaItems on (t.idCondicionVenta = condicionesVentaItems.idCondicionVenta)

GROUP BY itemsFacturaSaliente.idFacturaSaliente,t.idFacturaSaliente ";
                
                $sql="DROP VIEW `facturasSalientes_view`";
		$this->execute($sql);
		
		$sql="CREATE VIEW facturasSalientes_view as ($consulta)";
		$this->execute($sql);
	}

	public function down()
	{
		echo "m120322_185059_cambiaFactSAlViwe does not support migration down.\n";
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