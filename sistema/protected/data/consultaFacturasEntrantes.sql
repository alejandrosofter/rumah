SELECT t.*,proveedores.nombre as nombreProveedor,
if(t.condicion='Stock',
SUM(IF(compras_items.alicuotaIva='10.5',compras_items.importeCompra * compras_items.cantidad,0)),
	SUM(IF(facturasEntrantes_concepto.alicuotaIva='10.5',facturasEntrantes_concepto.importe ,0))) as importe105,
if(t.condicion='Stock',
SUM(IF(compras_items.alicuotaIva='21',compras_items.importeCompra * compras_items.cantidad ,0)),
	SUM(IF(facturasEntrantes_concepto.alicuotaIva='21',facturasEntrantes_concepto.importe ,0)))+t.importeFlete as importe21,
if(t.condicion='Stock',
SUM(compras_items.importeCompra*compras_items.cantidad*((compras_items.alicuotaIva/100)+1)), 
	SUM(facturasEntrantes_concepto.importe * ((facturasEntrantes_concepto.alicuotaIva/100)+1) ))+(t.importeFlete*1.21)+t.importeRecargos+t.importeImpuestos-t.importeDescuentos as importe FROM `facturasEntrantes` t 
LEFT JOIN compras_items on t.idFacturaEntrante = compras_items.idFacturaEntrante
LEFT JOIN proveedores on t.idProveedor = proveedores.idProveedor
LEFT JOIN facturasEntrantes_concepto on t.idFacturaEntrante = facturasEntrantes_concepto.idFacturaEntrante

GROUP BY t.idFacturaEntrante ORDER BY t.idFacturaEntrante desc


update `facturasEntrantes` set importeDescuentos=0, importeFlete=0, importeRecargos=0,importeImpuestos=0
