<?php

class m111019_155834_facturasEntrantes_cambiaVista extends CDbMigration
{
	public function up()
	{
		$sql="DROP VIEW `facturasEntrantes_view`";
		$this->execute($sql);
		
		$sql="CREATE VIEW facturasEntrantes_view as 
                    (SELECT t.*,
				if(t.condicion='Stock',
SUM(compras_items.importeCompra*compras_items.cantidad*(IF( t.tipoFactura='A',((compras_items.alicuotaIva/100)+1),1))), 
	SUM(facturasEntrantes_concepto.importe * (IF( t.tipoFactura='A',((facturasEntrantes_concepto.alicuotaIva/100)+1),1)) ))+(t.importeFlete*1.21)+t.importeRecargos+t.importeImpuestos-t.importeDescuentos-(t.importeDescuentos*0.21) as importe,
if(t.condicion='Stock',
SUM(IF(compras_items.alicuotaIva='10.5',compras_items.importeCompra*compras_items.cantidad,0)),
	SUM(IF(facturasEntrantes_concepto.alicuotaIva='10.5',facturasEntrantes_concepto.importe,0))) as importe105,
if(t.condicion='Stock',
SUM(IF(compras_items.alicuotaIva='21',compras_items.importeCompra*compras_items.cantidad,0))-(t.importeDescuentos*0.21),
	SUM(IF(facturasEntrantes_concepto.alicuotaIva='21',facturasEntrantes_concepto.importe,0))-(t.importeDescuentos*0.21)) as importe21 FROM `facturasEntrantes` t 
LEFT JOIN compras_items on t.idFacturaEntrante = compras_items.idFacturaEntrante
LEFT JOIN proveedores on t.idProveedor = proveedores.idProveedor
LEFT JOIN facturasEntrantes_concepto on t.idFacturaEntrante = facturasEntrantes_concepto.idFacturaEntrante

GROUP BY t.idFacturaEntrante ORDER BY t.idFacturaEntrante desc
)";
		$this->execute($sql);
	}

	public function down()
	{
		echo "m111019_155834_facturasEntrantes_cambiaVista does not support migration down.\n";
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