<?php

class m111011_165354_nuevaVistaFactEntrante extends CDbMigration
{
	public function up()
	{
		$sql="create view facturasEntrantes_view IF NOT EXISTS as (SELECT t.*,
				if(t.condicion='Stock',
SUM(compras_items.importeCompra*compras_items.cantidad),
	SUM(facturasEntrantes_concepto.importe)) as importe,
if(t.condicion='Stock',
SUM(IF(compras_items.alicuotaIva='10.5',compras_items.importeCompra*compras_items.cantidad,0)),
	SUM(IF(facturasEntrantes_concepto.alicuotaIva='10.5',facturasEntrantes_concepto.importe,0))) as importe105,
if(t.condicion='Stock',
SUM(IF(compras_items.alicuotaIva='21',compras_items.importeCompra*compras_items.cantidad,0)),
	SUM(IF(facturasEntrantes_concepto.alicuotaIva='21',facturasEntrantes_concepto.importe,0))) as importe21 FROM facturasEntrantes t
LEFT JOIN proveedores on proveedores.idProveedor = t.idProveedor 
	LEFT JOIN compras_items on t.idFacturaEntrante = compras_items.idFacturaEntrante 
	LEFT JOIN facturasEntrantes_concepto on t.idFacturaEntrante = facturasEntrantes_concepto.idFacturaEntrante group by t.idFacturaEntrante order by t.idFacturaEntrante desc)";
	//$this->execute($sql); 
	}

	public function down()
	{
		$sql="DROP VIEW  `facturasEntrantes_view`";
	$this->execute($sql); 
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