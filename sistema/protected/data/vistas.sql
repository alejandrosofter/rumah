CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `facturasSalientes_view` AS (select `clientes`.`idCliente` AS `idCliente`,`facturasSalientes`.`estado` AS `estado`,`facturasSalientes`.`numeroFactura` AS `numeroFactura`,group_concat(`itemsFacturaSaliente`.`nombreItem` separator ',') AS `detalle`,sum(`pagos`.`importeDinero`) AS `importePagado`,if((`clientes`.`tipoCliente` = 'Empresa'),`clientes`.`razonSocial`,concat(`clientes`.`apellido`,', ',`clientes`.`nombre`)) AS `cliente`,count(`facturasSalientes`.`idFacturaSaliente`) AS `cantidadItems`,sum((`itemsFacturaSaliente`.`cantidad` * `itemsFacturaSaliente`.`importeItem`)) AS `importe`,`facturasSalientes`.`fecha` AS `fecha`,`facturasSalientes`.`idFacturaSaliente` AS `idFacturaSaliente`,sum(if((`itemsFacturaSaliente`.`porcentajeIva` = '10.5'),(`itemsFacturaSaliente`.`cantidad` * `itemsFacturaSaliente`.`importeItem`),0)) AS `importe105`,sum(if((`itemsFacturaSaliente`.`porcentajeIva` = '21'),(`itemsFacturaSaliente`.`cantidad` * `itemsFacturaSaliente`.`importeItem`),0)) AS `importe21`,`facturasSalientes`.`tipoFactura` AS `tipoFactura` from ((((`facturasSalientes` left join `itemsFacturaSaliente` on((`itemsFacturaSaliente`.`idFacturaSaliente` = `facturasSalientes`.`idFacturaSaliente`))) join `clientes` on((`clientes`.`idCliente` = `facturasSalientes`.`idCliente`))) left join `pagosFactura` on((`pagosFactura`.`idFacturaSaliente` = `facturasSalientes`.`idFacturaSaliente`))) left join `pagos` on((`pagos`.`idPago` = `pagosFactura`.`idPago`))) group by `facturasSalientes`.`idFacturaSaliente`);

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `facturasEntrantes_view` AS select `t`.`idFacturaEntrante` AS `idFacturaEntrante`,`t`.`idProveedor` AS `idProveedor`,`t`.`fecha` AS `fecha`,`t`.`fechaVencimiento` AS `fechaVencimiento`,`t`.`numeroFactura` AS `numeroFactura`,`t`.`precio` AS `precio`,`t`.`descripcion` AS `descripcion`,`t`.`estado` AS `estado`,`t`.`tipoFactura` AS `tipoFactura`,`t`.`idCentroCosto` AS `idCentroCosto`,`t`.`iva21` AS `iva21`,`t`.`iva105` AS `iva105`,`t`.`esCorriente` AS `esCorriente`,`t`.`condicion` AS `condicion`,`t`.`condicionIva` AS `condicionIva`,`t`.`idCondicionCompra` AS `idCondicionCompra`,if((`t`.`condicion` = 'Stock'),sum((`compras_items`.`importeCompra` * `compras_items`.`cantidad`)),sum(`facturasEntrantes_concepto`.`importe`)) AS `importe`,if((`t`.`condicion` = 'Stock'),sum(if((`compras_items`.`alicuotaIva` = '10.5'),(`compras_items`.`importeCompra` * `compras_items`.`cantidad`),0)),sum(if((`facturasEntrantes_concepto`.`alicuotaIva` = '10.5'),`facturasEntrantes_concepto`.`importe`,0))) AS `importe105`,if((`t`.`condicion` = 'Stock'),sum(if((`compras_items`.`alicuotaIva` = '21'),(`compras_items`.`importeCompra` * `compras_items`.`cantidad`),0)),sum(if((`facturasEntrantes_concepto`.`alicuotaIva` = '21'),`facturasEntrantes_concepto`.`importe`,0))) AS `importe21` from (((`facturasEntrantes` `t` left join `proveedores` on((`proveedores`.`idProveedor` = `t`.`idProveedor`))) left join `compras_items` on((`t`.`idFacturaEntrante` = `compras_items`.`idFacturaEntrante`))) left join `facturasEntrantes_concepto` on((`t`.`idFacturaEntrante` = `facturasEntrantes_concepto`.`idFacturaEntrante`))) group by `t`.`idFacturaEntrante` order by `t`.`idFacturaEntrante` desc;
